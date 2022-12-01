<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MotorCheckController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/testimage', [\App\Http\Controllers\Controller::class, 'imageTest']);
Route::post('/test', [\App\Http\Controllers\Controller::class, 'test2']);
Route::middleware(['admin-cms'])
    ->prefix('admin-cms')
    ->group(function () {
        //Users
        Route::get('users/all', [UserController::class, 'all']);
        Route::post('update/user/{id}', [UserController::class, 'updateUserById']);
        //Posts
        Route::get('posts/all', [PostController::class, 'allPosts']);
        Route::post('posts/update/{id}', [PostController::class, 'updatePosts']);
        //Memberships
        Route::get('memberships/all', [MembershipController::class, 'index']);
        Route::post('memberships/new', [MembershipController::class, 'store']);
        Route::post('memberships/update', [MembershipController::class, 'update']);
        //Make
        Route::get('make/all', [MakeController::class, 'index']);
        Route::post('make/new', [MakeController::class, 'store']);
        Route::post('make/update/{id}', [MakeController::class, 'update']);
        //Model
        Route::get('model/all', [ModelController::class, 'index']);
        Route::post('model/new', [ModelController::class, 'store']);
        Route::post('model/update/{id}', [ModelController::class, 'update']);
        //Fuel
        Route::get('fuel/all', [FuelController::class, 'index']);
        Route::post('fuel/new', [FuelController::class, 'store']);
        Route::post('fuel/update/{id}', [FuelController::class, 'update']);
        //Notification
        Route::get('notification/all', [NotificationController::class, 'index']);
        Route::post('notification/new', [NotificationController::class, 'store']);
        Route::post('notification/update/{id}', [NotificationController::class, 'update']);
        //Payment
        Route::get('payment/all', [PaymentController::class, 'index']);
        Route::post('payment/new', [PaymentController::class, 'store']);
        Route::post('payment/update/{id}', [PaymentController::class, 'update']);
        //Rating
        Route::get('rating/all', [RatingController::class, 'index']);
        Route::post('rating/new', [RatingController::class, 'store']);
        Route::post('rating/update/{id}', [RatingController::class, 'update']);
        //Device
        Route::get('device/all', [DeviceController::class, 'index']);
        Route::post('device/new', [DeviceController::class, 'store']);
        Route::post('device/update/{id}', [DeviceController::class, 'update']);
        //Feedback
        Route::get('feedback/all', [FeedbackController::class, 'index']);
        //Get Products Stripe
        Route::get('/updateProductPrices', [Controller::class, 'updateProductPrices']);
        Route::get('/getProductPrices', [Controller::class, 'getProductPrices']);
    });


// Auth Routes
Route::middleware([])
    ->prefix('auth')
    ->group(function () {
        Route::middleware([])
            ->group(function () {
                Route::post('/register', [AuthController::class, 'register']);
                Route::post('/login', [AuthController::class, 'login']);
                Route::post('/login-facebook', [AuthController::class, 'loginFacebook']);
                Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
            });
    });

// User Routes
Route::middleware(['auth:api'])
    ->prefix('user')
    ->group(function () {
        Route::get('/', [UserController::class, 'me']);
        Route::get('/all', [UserController::class, 'all']);
        Route::post('/update', [UserController::class, 'updateProfile']);
        Route::get('/{id}', [UserController::class, 'getUserProfile']);
    });

// User Routes
Route::middleware(['auth:api'])
    ->prefix('message')
    ->group(function () {
        Route::post('/', [MessageController::class, 'message']);
        Route::get('/', [MessageController::class, 'allMessages']);
        Route::get('/{conversationId}', [MessageController::class, 'messages']);
    });

// Post Routes
Route::middleware(['auth:api'])
    ->prefix('post')
    ->group(function () {
        Route::get('/', [PostController::class, 'allPosts']);
        Route::post('/', [PostController::class, 'newPost']);
        Route::get('/trader/{trader_id}', [PostController::class, 'getTraderPosts']);
        Route::patch('/{id}', [PostController::class, 'updatePosts']);
        Route::delete('/{post}', [PostController::class, 'deletePost']);
        Route::get('/{id}', [PostController::class, 'getPost']);
        Route::get('/reg/{regno}', [PostController::class, 'getCarDetails']);
    });

// Membership Routes
Route::middleware(['auth:api', 'admin'])
    ->group(function () {
        Route::resource('membership', MembershipController::class);
    });

// Mixed Routes WIP
Route::middleware(['auth:api'])
    ->group(function () {
        Route::get('search/traders', [UserController::class, 'searchUser']);
        Route::resource('make', MakeController::class);
        Route::resource('model', ModelController::class);
        Route::resource('fuel', FuelController::class);
        Route::resource('notification', NotificationController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('rating', RatingController::class);
        Route::resource('device', DeviceController::class);
        Route::resource('feedback', FeedbackController::class);
        Route::resource('chat', ChatController::class);
        Route::resource('deal', DealController::class);
        Route::resource('image', ImageController::class);
        Route::resource('alert', AlertController::class);
        Route::get('moto-check/{regno}/{mileage}', [MotorCheckController::class, 'motorCheck']);
    });
