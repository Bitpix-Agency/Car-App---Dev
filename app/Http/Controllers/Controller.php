<?php

namespace App\Http\Controllers;

use App\Helpers\Base64ImageHelper;
use App\Helpers\ResponseHelper;
use App\Models\PostImage;
use App\Models\StripePayment;
use App\Models\User;
use App\Services\ChatService;
use App\Services\DealService;
use App\Services\DeviceService;
use App\Services\FeedbackService;
use App\Services\FuelService;
use App\Services\MakeService;
use App\Services\MembershipService;
use App\Services\ModelService;
use App\Services\NotificationService;
use App\Services\PaymentService;
use App\Services\PostService;
use App\Services\RatingService;
use App\Services\UserService;
use Facebook\Facebook;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Stripe\Exception\ApiErrorException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var ResponseHelper
     */
    protected $responseHelper;
    /**
     * @var UserService
     */
    protected $userService;
    /**
     * @var PostService
     */
    protected $postService;
    /**
     * @var MembershipService
     */
    protected $membershipService;
    /**
     * @var DeviceService
     */
    protected $deviceService;
    /**
     * @var FeedbackService
     */
    protected $feedbackService;
    /**
     * @var FuelService
     */
    protected $fuelService;
    /**
     * @var MakeService
     */
    protected $makeService;
    /**
     * @var ModelService
     */
    protected $modelService;
    /**
     * @var NotificationService
     */
    protected $notificationService;
    /**
     * @var PaymentService
     */
    protected $paymentService;
    /**
     * @var RatingService
     */
    protected $ratingService;
    /**
     * @var ChatService
     */
    protected $chatService;
    /**
     * @var DealService
     */
    protected $dealService;
    /**
     * @var Base64ImageHelper
     */
    protected $base64ImageHelper;

    /**
     * Controller constructor.
     * @param ResponseHelper $responseHelper
     * @param UserService $userService
     * @param PostService $postService
     * @param MembershipService $membershipService
     * @param DeviceService $deviceService
     * @param FeedbackService $feedbackService
     * @param FuelService $fuelService
     * @param MakeService $makeService
     * @param ModelService $modelService
     * @param NotificationService $notificationService
     * @param PaymentService $paymentService
     * @param RatingService $ratingService
     * @param ChatService $chatService
     * @param DealService $dealService
     * @param Base64ImageHelper $base64ImageHelper
     */
    public function __construct
    (
        ResponseHelper $responseHelper,
        UserService $userService,
        PostService $postService,
        MembershipService $membershipService,
        DeviceService $deviceService,
        FeedbackService $feedbackService,
        FuelService $fuelService,
        MakeService $makeService,
        ModelService $modelService,
        NotificationService $notificationService,
        PaymentService $paymentService,
        RatingService $ratingService,
        ChatService $chatService,
        DealService $dealService,
        Base64ImageHelper $base64ImageHelper
    )
    {
        $this->responseHelper = $responseHelper;
        $this->userService = $userService;
        $this->postService = $postService;
        $this->membershipService = $membershipService;
        $this->deviceService = $deviceService;
        $this->feedbackService = $feedbackService;
        $this->fuelService = $fuelService;
        $this->makeService = $makeService;
        $this->modelService = $modelService;
        $this->notificationService = $notificationService;
        $this->paymentService = $paymentService;
        $this->ratingService = $ratingService;
        $this->chatService = $chatService;
        $this->dealService = $dealService;
        $this->base64ImageHelper = $base64ImageHelper;
    }

    public function imageTest(Request $request)
    {
        $compressedImage = cloudinary()->upload($request->file('photo')->getRealPath(), [
            'transformation' => [
                'quality' => 20,
            ]
        ])->getSecurePath();

        dd($compressedImage);

//        $response = cloudinary()->upload($request->file('photo')->getRealPath())->getSecurePath();

//        if ($request->file('photo')->isValid()) {
//            $image = $request->file('photo');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $img = Image::make($image)->save(storage_path('pictures/' . $filename), 20);
//
//            $file_path = 'test-images';
//            $test = Storage::disk('spaces')->putFile('test-images', $img->basePath(), 'public');
//        }
//        dd("sadas");
//
//        $filename = time() . '.' . $image->getClientOriginalExtension();
//        $test = Image::make($filename)->save(public_path('/pictures/' . $filename), 20);
//        dd($test);

    }

    public function test2(Request $request)
    {
//        $message = "Test Without SDK";
//        $token = "EAAHkh798ktQBAMZB8qJtEE2N4dbpZC9OApIyOA8e3wwICPaRgZBp4uxiEzcJh3Ut0Opi5ytu3yKXdjM1RilJ0JESzUSBZAYngZBwzCzwQhfz8z3CjCW11AYJpK7DXhPAoZCHrsgI38TrKS5EkzbQaaDZCmD6hj6Vgd34rWWRZCKr3vlbpZByY0nqm";
////        Http::post('https://graph.facebook.com/794253367879499/feed', [
////            'access_token' => $token,
////            'message' => $message,
////        ]);
//
//        $response = Http::post('https://graph.facebook.com/794253367879499/feed', [
//            'access_token' => $token,
//            'message' => $message,
//        ]);

        $photos = [];
        $fb = new Facebook([
            'app_id' => '532746661040852',
            'app_secret' => 'a03b497f0a4d282a752dc70cc88f1ed4',
            'default_graph_version' => 'v9.0'
        ]);

        $fb->setDefaultAccessToken(env('FACEBOOK_ACCESS_TOKEN'));

        $postsImages = PostImage::where('post_id', 29408)->get();

        $endpoint = "/" . env('FACEBOOK_PAGE_ID') . "/photos";

        foreach ($postsImages as $file_url) {
            array_push($photos, $fb->request('POST', $endpoint, ['url' => $file_url->url, 'published' => FALSE,]));
        }

        $uploaded_photos = $fb->sendBatchRequest($photos, env('FACEBOOK_ACCESS_TOKEN'));
        $data_post = array("attached_media" => array(), "message" => array(), 'access_token' => env('FACEBOOK_ACCESS_TOKEN'));

        foreach ($uploaded_photos as $photo) {
            array_push($data_post['attached_media'], '{"media_fbid":"' . $photo->getDecodedBody()['id'] . '"}');
        }

        $placeholder = "placeholder";

        $message = "";
        $message = $message . "🚨App Verified Trader🚨 \n";
        $message = $message . "REG Number: placeholder\n";
        $message = $message . "Mileage: placeholder\n";
        $message = $message . "Make: placeholder\n";
        $message = $message . "Model: placeholder\n";
        $message = $message . "Price: £ placeholder\n";
        $message = $message . "Overview: " . $placeholder . " | " . $placeholder . " | " . $placeholder . " doors | " . $placeholder . "\n";
        $message = $message . "Location:" . $placeholder . "\n";
        $message = $message . "Dealer:" . $placeholder . "\n";
        $message = $message . "Description:" . "\n";
        $message = $message . $placeholder . "\n";
        $message = $message . "Link " . url('/app/post/' . 1);

        $data_post['message'] = $message;
        $data_post['url'] = url('/app/post/' . $placeholder);

        Http::post('https://graph.facebook.com/' . env('FACEBOOK_PAGE_ID') . '/feed', $data_post);
    }


    public function test(Request $request)
    {
        $file = $request->file('file');

        $test = Storage::disk('spaces')->putFile('uploads', $file, 'public');

        dd($test);
    }

    /**
     * @return JsonResponse
     * @throws ApiErrorException
     */
    public function updateProductPrices(): JsonResponse
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $prices = $stripe->prices->all();

        StripePayment::truncate();

        foreach ($prices as $price) {
            if ($price->product === env('STRIPE_PRODUCT_ID')) {
                $newPaymentType = StripePayment::updateOrCreate([
                    'price_id' => $price->id,
                ], [
                    'product_id' => $price->product,
                    'price_id' => $price->id,
                    'price' => sprintf('%.2f', $price->unit_amount / 100),
                    'name' => $price->nickname ?? null
                ]);
                $newPaymentType->save();
            }
        }

        return $this->responseHelper->response(true, "Added prices", StripePayment::all(), 200);
    }

    /**
     * @return JsonResponse
     */
    public function getProductPrices(): JsonResponse
    {
        return $this->responseHelper->response(true, "Added prices", StripePayment::all(), 200);
    }

}
