<?php

namespace App\Http\Livewire;

use App\Jobs\ListingJob;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\Post;
use App\Models\VehicleInformation;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class ListingComponent extends Component
{
    use WithFileUploads;

    public $currentStep = 1, $regNo, $makeId, $modelId, $mileage, $price, $fuelId, $doors, $type, $seats, $year, $engine;
    public $owners, $transmission, $showLocation, $postDesc, $keys, $serviceHistory, $dealerHistory, $vehicleStatus;
    public $v5Status, $tread1, $tread2, $tread3, $tread4, $success = false, $motExpire, $prep, $accessToken, $errorMessage = null;

    public $photos = [];
    public $isActive = 0;

    public function render()
    {
        return view('livewire.listing-component', [
            'makes' => Make::all(),
            'models' => Models::all(),
            'fuels' => FuelType::all(),
        ]);
    }

    public function firstStepSubmit()
    {
        $this->regNo = str_replace(' ', '', $this->regNo);
        $vehicleData = VehicleInformation::where('regno', $this->regNo)->first();

        if (!$vehicleData) {
            $getToken = Http::post(env('MOTOR_SPEC_URL') . '/oauth', [
                'grant_type' => env('MOTOR_SPEC_GRANT_TYPE'),
                'client_id' => env('MOTOR_SPEC_CLIENT_ID'),
                'client_secret' => env('MOTOR_SPEC_CLIENT_SECRET'),
            ]);

            $this->accessToken = $getToken->json()['access_token'];

            $carData = Http::withHeaders([
                'Accept' => 'application/vnd.identity-specs.v2+json',
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/vnd.identity-specs.v2+json'
            ])->post(env('MOTOR_SPEC_URL') . '/identity-specs/lookup', [
                'registration' => $this->regNo
            ])->json();

            if (isset($carData['status']) == 404) {
                return $this->errorMessage = "Registration Not Found Try Again";
            }

            $this->regNo = $carData['registration'];

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
            $newVehicleData->doors = $carData['specsVehicle']['doors'] ?? 0;
            $newVehicleData->type = $carData['specsVehicle']['body'] ?? "Not Supplied";
            $newVehicleData->seats = $carData['vehicle']['mvris']['seatCount'] ?? 5;
            $newVehicleData->year = $carData['specsVehicle']['modelYear'] ?? "9999";
            $newVehicleData->engine = $carData['specsVehicle']['engineCC'] ?? "Not Supplied";
            $newVehicleData->owners = $carData['vehicle']['keepers']['numberOfPrevious'] ?? 0;
            $newVehicleData->transmission = $carData['specsVehicle']['transmission'] ?? "Not Supplied";
            $newVehicleData->save();

            $this->makeId = $newVehicleData->make_id;
            $this->modelId = $newVehicleData->model_id;
            $this->fuelId = $newVehicleData->fuel_id;
            $this->doors = $newVehicleData->doors;
            $this->type = $newVehicleData->type;
            $this->seats = $newVehicleData->seats;
            $this->year = $newVehicleData->year;
            $this->engine = $newVehicleData->engine;
            $this->owners = $newVehicleData->owners;
            $this->transmission = $newVehicleData->transmission;

        } else {
            $this->makeId = $vehicleData->make_id;
            $this->modelId = $vehicleData->model_id;
            $this->fuelId = $vehicleData->fuel_id;
            $this->doors = $vehicleData->doors;
            $this->type = $vehicleData->type;
            $this->seats = $vehicleData->seats;
            $this->year = $vehicleData->year;
            $this->engine = $vehicleData->engine;
            $this->owners = $vehicleData->owners;
            $this->transmission = $vehicleData->transmission;
        }
        $this->currentStep = 2;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'regNo' => 'required',
            'makeId' => 'required|integer',
            'modelId' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required',
            'fuelId' => 'required|integer',
            'doors' => 'required|integer',
            'type' => 'required',
            'seats' => 'required|integer',
            'year' => 'required|integer',
            'engine' => 'required',
            'owners' => 'required|integer',
            'transmission' => 'required',
            'postDesc' => 'required',
            'photos.*' => 'required|image|max:10024',
            'photos' => 'max:25',
            'keys' => 'required',
            'serviceHistory' => 'required',
            'dealerHistory' => 'required',
            'vehicleStatus' => 'required',
            'v5Status' => 'required',
            'tread1' => 'required|integer',
            'tread2' => 'required|integer',
            'tread3' => 'required|integer',
            'tread4' => 'required|integer',
            'prep' => 'required|integer',
        ], [
            'photos.max' => "Can't upload more then 25 files"
        ]);

        $this->isActive = 1;

        $getToken = Http::post(env('MOTOR_SPEC_URL') . '/oauth', [
            'grant_type' => env('MOTOR_SPEC_GRANT_TYPE'),
            'client_id' => env('MOTOR_SPEC_CLIENT_ID'),
            'client_secret' => env('MOTOR_SPEC_CLIENT_SECRET'),
        ]);

        $this->accessToken = $getToken->json()['access_token'];

        $prices = Http::withHeaders([
            'Accept' => 'application/vnd.valuation-auto-trader.v2+json',
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Content-Type' => 'application/vnd.valuation-auto-trader.v2+json'
        ])->post(env('MOTOR_SPEC_URL') . '/valuation-autotrader/value', [
            'registration' => $this->regNo,
            'currentMiles' => $this->mileage
        ])->json();

        $newpost = new Post();
        $newpost->user_id = auth()->user()->id;
        $newpost->title = Make::where('id', $this->makeId)->first()->name . " " . Models::where('id', $this->modelId)->first()->name;
        $newpost->regno = $this->regNo;
        $newpost->make_id = $this->makeId;
        $newpost->model_id = $this->modelId;
        $newpost->mileage = $this->mileage;
        $newpost->price = $this->price;
        $newpost->fuel_type_id = $this->fuelId;
        $newpost->doors = $this->doors;
        $newpost->type = $this->type;
        $newpost->seats = $this->seats ?? 5;
        $newpost->year = $this->year;
        $newpost->engine = $this->engine;
        $newpost->owners = $this->owners;
        $newpost->transition = $this->transmission;
        $newpost->post_desc = $this->postDesc;
        $newpost->keys = $this->keys;
        $newpost->service_history = $this->serviceHistory;
        $newpost->dealer_history = $this->dealerHistory;
        $newpost->vehicle_status = $this->vehicleStatus;
        $newpost->has_v5 = $this->v5Status;
        $newpost->tread_1 = $this->tread1;
        $newpost->tread_2 = $this->tread2;
        $newpost->tread_3 = $this->tread3;
        $newpost->tread_4 = $this->tread4;
        $newpost->mot_expire = $this->motExpire;
        $newpost->prep = $this->prep;
        $newpost->is_waiting = true;

        //Missing
        $newpost->is_bid = false;
        $newpost->location = "Test Location";

        $newpost->rrp = $prices['autotraderValuation']['valuation']['retail'] ?? 0;
        $newpost->save();

        $photos = [];
        foreach ($this->photos as $photo) {
            $photos[] = $photo->getRealPath();
        }
        $this->success = "Post Added";

        dispatch(new ListingJob($newpost, auth()->user(), $photos));

        return redirect()->to('/post-added');
    }
}
