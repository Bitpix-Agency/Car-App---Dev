<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'auth.login.login-method')->name('main');
Route::view('/auth/login/email', 'auth.login.login-email')->name('login-email');
Route::view('/auth/register/{firstname}/{lastname}/{email}', 'auth.login.register');

Route::get('auth/login/facebook', [UserController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [UserController::class, 'loginWithFacebook']);
Route::view('/auth/register/facebook/{name}/{email}/{fbid}', 'auth.login.register-facebook');

Route::view('/invite/{email}', 'auth.register.step-1');

Route::get('/logout', [UserController::class, 'logout']);
Route::view('/forgotPassword', 'auth.reset-password.forgotten-password');
Route::view('/app/rating/{soldtoUserId}/{postId}', 'rating');
Route::view('/legal/privacy-policy', 'legal.privacy-policy');
Route::view('/support', 'support.support');
Route::view('/support/change-email', 'support.reset-email');
Route::view('/support/faqs', 'support.faqs');

Route::view('/verification', 'auth.register.step-8')->name('verification');
// Auth Routes
Route::middleware(['auth:web', 'user-check'])
    ->group(function () {
        Route::view('/post-added', 'adding_post')->name('post-added');
        Route::view('/app/sold', 'sold');
        Route::view('/app/dashboard', 'dashboard');
        Route::view('/app/posts', 'posts')->name('posts');
        Route::view('/app/post/{id}', 'post');
        Route::view('/app/support', 'support');
        Route::view('/app/traders', 'traders');
        Route::view('/app/trader/{id}', 'trader');
        Route::view('/app/leaderboard', 'leaderboard');
        Route::view('/app/inbox', 'inbox');
        Route::view('/app/alerts', 'alerts');
        Route::view('/app/editor', 'image-editor');

        Route::view('/app/account/profile', 'profile.profile');
        Route::view('/app/account/feedback', 'profile.feedback');
        Route::view('/app/account/listings', 'profile.listings')->name('listings');
        Route::view('/app/account/edit-listings/{id}', 'profile.edit-listing');
        Route::view('/app/account/listings/create', 'profile.new-listing');
        Route::view('/app/account/listing/{id}/sold', 'sold')->name('sold');
        Route::view('/app/account', 'profile.account');
        Route::view('/app/account/users', 'profile.users');
        Route::view('/app/account/invite', 'profile.invite');
        Route::view('/app/account/password', 'profile.password');
        Route::view('/app/account/billing', 'profile.billing');
        Route::view('/app/account/invoices', 'profile.invoices');
        Route::view('/app/account/subscription', 'profile.subscription');
    });


