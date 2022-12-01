<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPostRequest;
use App\Http\Requests\PostSearchRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Deal;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\VehicleInformation;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getTraderPosts(int $id): JsonResponse
    {
        $posts = Post::where('user_id', $id)->with('images', 'fuelType', 'make', 'models')->orderBy('id', 'desc')->paginate(15);
        return $this->responseHelper->response(true, "Got Traders Listings", $posts, 200);
    }

    /**
     * @param string $regno
     * @return JsonResponse
     */
    public function getCarDetails(string $regno): JsonResponse
    {
        $regNo = str_replace(' ', '', $regno);
        $vehicleData = VehicleInformation::where('regno', $regNo)->first();

        if (!$vehicleData) {
            $getToken = Http::post(env('MOTOR_SPEC_URL') . '/oauth', [
                'grant_type' => env('MOTOR_SPEC_GRANT_TYPE'),
                'client_id' => env('MOTOR_SPEC_CLIENT_ID'),
                'client_secret' => env('MOTOR_SPEC_CLIENT_SECRET'),
            ]);

            $accessToken = $getToken->json()['access_token'];

            $carData = Http::withHeaders([
                'Accept' => 'application/vnd.identity-specs.v2+json',
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/vnd.identity-specs.v2+json'
            ])->post(env('MOTOR_SPEC_URL') . '/identity-specs/lookup', [
                'registration' => $regNo
            ])->json();

            if (isset($carData['status']) == 404) {
                return $this->responseHelper->response(false, 'Reg Not Found', [], 404);
            }

            $regNo = $carData['registration'];

            $checkMake = Make::updateOrCreate(
                [
                    'name' => strtoupper($carData['vehicle']['dvla']['make'])
                ],
                [
                    'name' => strtoupper($carData['vehicle']['dvla']['make'])
                ]
            );

            $checkModel = Models::updateOrCreate(
                [
                    'name' => strtoupper($carData['vehicle']['dvla']['model'])
                ],
                [
                    'name' => strtoupper($carData['vehicle']['dvla']['model']),
                    'make_id' => $checkMake->id
                ]
            );

            $checkFuel = FuelType::updateOrCreate(
                [
                    'name' => strtoupper($carData['vehicle']['combined']['fuel'])
                ],
                [
                    'name' => strtoupper($carData['vehicle']['combined']['fuel'])
                ]
            );

            $newVehicleData = new VehicleInformation();
            $newVehicleData->regno = $carData['registration'];
            $newVehicleData->make_id = $checkMake->id;
            $newVehicleData->model_id = $checkModel->id;
            $newVehicleData->fuel_id = $checkFuel->id;
            $newVehicleData->doors = $carData['specsVehicle']['doors'];
            $newVehicleData->type = $carData['specsVehicle']['body'];
            $newVehicleData->seats = $carData['vehicle']['mvris']['seatCount'] ?? 5;
            $newVehicleData->year = $carData['specsVehicle']['modelYear'];
            $newVehicleData->engine = $carData['specsVehicle']['engineCC'];
            $newVehicleData->owners = $carData['vehicle']['keepers']['numberOfPrevious'] ?? 0;
            $newVehicleData->transmission = $carData['specsVehicle']['transmission'];
            $newVehicleData->save();

            $data = [
                'makeId' => $newVehicleData->make_id,
                'modelId' => $newVehicleData->model_id,
                'fuelId' => $newVehicleData->fuel_id,
                'doors' => $newVehicleData->doors,
                'type' => $newVehicleData->type,
                'seats' => $newVehicleData->seats,
                'year' => $newVehicleData->year,
                'engine' => $newVehicleData->engine,
                'owners' => $newVehicleData->owners,
                'transmission' => $newVehicleData->transmission
            ];

            return $this->responseHelper->response(true, 'Got Vehicle Data', $data, 200);

        } else {
            $data = [
                'makeId' => $vehicleData->make_id,
                'modelId' => $vehicleData->model_id,
                'fuelId' => $vehicleData->fuel_id,
                'doors' => $vehicleData->doors,
                'type' => $vehicleData->type,
                'seats' => $vehicleData->seats,
                'year' => $vehicleData->year,
                'engine' => $vehicleData->engine,
                'owners' => $vehicleData->owners,
                'transmission' => $vehicleData->transmission,
            ];
            return $this->responseHelper->response(true, 'Got Vehicle Data', $data, 200);
        }
    }

    /**
     * @param PostSearchRequest $request
     * @return JsonResponse
     */
    public function allPosts(PostSearchRequest $request): JsonResponse
    {
        $posts = Post::query()->with('user', 'make', 'models', 'images', 'fuelType')->where('is_sold', false);
        if ($request->modelId)
            $posts = $posts->where('model_id', $request->modelId);

        if ($request->makeId)
            $posts = $posts->where('make_id', $request->makeId);

        if ($request->minPrice)
            $posts = $posts->where('price', '>=', $request->minPrice);

        if ($request->mileage)
            $posts = $posts->where('mileage', '>=', $request->mileage);

        if ($request->year)
            $posts = $posts->where('year', $request->year);

        if ($request->seatId)
            $posts = $posts->where('seats', $request->seatId);

        if ($request->reg)
            $posts = $posts->where('regno', 'like', '%' . $request->reg . '%');

        if ($request->fuelId)
            $posts = $posts->where('fuel_type_id', $request->fuelId);

        $posts = $posts->orderBy('updated_at', $request->sortBy)->paginate(20);
        return $this->responseHelper->response('true', 'Got Posts', $posts, 200);
    }

    /**
     * @param NewPostRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function newPost(NewPostRequest $request): JsonResponse
    {
        $getToken = Http::post(env('MOTOR_SPEC_URL') . '/oauth', [
            'grant_type' => env('MOTOR_SPEC_GRANT_TYPE'),
            'client_id' => env('MOTOR_SPEC_CLIENT_ID'),
            'client_secret' => env('MOTOR_SPEC_CLIENT_SECRET'),
        ]);

        $accessToken = $getToken->json()['access_token'];

        $prices = Http::withHeaders([
            'Accept' => 'application/vnd.valuation-auto-trader.v2+json',
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/vnd.valuation-auto-trader.v2+json'
        ])->post(env('MOTOR_SPEC_URL') . '/valuation-autotrader/value', [
            'registration' => $request->regNo,
            'currentMiles' => $request->mileage
        ])->json();

        $newpost = new Post();
        $newpost->user_id = auth()->user()->id;
        $newpost->title = Make::where('id', $request->makeId)->first()->name . " " . Models::where('id', $request->modelId)->first()->name;
        $newpost->regno = $request->regNo;
        $newpost->make_id = $request->makeId;
        $newpost->model_id = $request->modelId;
        $newpost->mileage = $request->mileage;
        $newpost->price = $request->price;
        $newpost->fuel_type_id = $request->fuelId;
        $newpost->doors = $request->doors;
        $newpost->type = $request->type;
        $newpost->seats = $request->seats;
        $newpost->year = $request->year;
        $newpost->engine = $request->engine;
        $newpost->owners = $request->owners;
        $newpost->transition = $request->transmission;
        $newpost->post_desc = $request->postDesc;
        $newpost->keys = $request->keys;
        $newpost->service_history = $request->serviceHistory;
        $newpost->dealer_history = $request->dealerHistory;
        $newpost->vehicle_status = $request->vehicleStatus;
        $newpost->has_v5 = $request->v5Status;
        $newpost->tread_1 = $request->tread1;
        $newpost->tread_2 = $request->tread2;
        $newpost->tread_3 = $request->tread3;
        $newpost->tread_4 = $request->tread4;
        $newpost->mot_expire = $request->motExpire;
        $newpost->prep = $request->prep;

        //Missing
        $newpost->is_bid = false;
        $newpost->location = "Test Location";

        $newpost->rrp = $prices['autotraderValuation']['valuation']['retail'] ?? 0;
        $newpost->save();


//        $newPost = $this->postService->newPost($request->all());

        if ($request->post_image) {
            foreach ($request->post_image as $image) {
                $file_path = 'post-images/' . auth()->user()->id . '/' . $newpost->id . '/' . random_int(0, 999999999999) . time() . '.png';
                $saveImage = $this->base64ImageHelper->saveImage($image, $file_path);

                $newPostImage = new PostImage();
                $newPostImage->post_id = $newpost->id;
                $newPostImage->url = $saveImage;
                $newPostImage->save();
            }
        }

        return $this->responseHelper->response('true', 'Added Posts', $newpost->with('images'), 200);
    }

    /**
     * @param UpdatePostRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function updatePosts(UpdatePostRequest $request, int $id): JsonResponse
    {
        $updatePost = $this->postService->updatePost($request->all(), $id);

        if ($request->post_image) {
            foreach ($request->post_image as $image) {
                $file_path = 'post-images/' . auth()->user()->id . '/' . $updatePost->id . '/' . random_int(0, 999999999999) . time() . '.png';
                $saveImage = $this->base64ImageHelper->saveImage($image, $file_path);

                $newPostImage = new PostImage();
                $newPostImage->post_id = $updatePost->id;
                $newPostImage->url = $saveImage;
                $newPostImage->save();
            }
        }

        return $this->responseHelper->response('true', 'Updated Posts', $updatePost, 200);
    }

    /**
     * @param Post $post
     * @return JsonResponse
     * @throws Exception
     */
    public function deletePost(Post $post): JsonResponse
    {
        $post->is_deleted = true;
        $post->save();
        $post->delete();

        return $this->responseHelper->response('true', 'Deleted Posts', [], 200);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getPost(int $id): JsonResponse
    {
        $post = Post::where('id', $id)->with('user', 'make', 'models', 'images', 'fuelType')->first();
        return $this->responseHelper->response('true', 'Post', $post, 200);
    }
}
