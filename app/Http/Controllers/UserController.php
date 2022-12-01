<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function updateUserById(Request $request, $id): JsonResponse
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->fill($request->all());
        $user->save();

        $userProfile = UserProfile::where('user_id', $id)->firstOrFail();
        $userProfile->fill($request->all());
        $userProfile->save();

        return $this->responseHelper->response(true, "Updated User", User::where('id', $id)->with('profile')->first(), 200);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if (!$isUser) {
                $hasGotEmail = User::where('email', $user->email)->first();
                if ($hasGotEmail) {
                    $hasGotEmail->fb_id = $user->id;
                    $hasGotEmail->save();

                    $profile = UserProfile::where('user_id', $hasGotEmail->id)->first();
                    $profile->profile_image = $user->avatar;
                    $profile->save();
                } else {
                    return redirect('/auth/register/facebook/' . $user->name . '/' . $user->email . '/' . $user->id);
                }
            }

            $isUser = User::where('fb_id', $user->id)->first();
            if ($isUser) {
                $profile = UserProfile::where('user_id', $isUser->id)->first();
                $profile->profile_image = $user->avatar;
                $profile->save();
                auth()->login($isUser);
                return redirect('/app/dashboard');
            } else {
                return redirect('/auth/register/facebook/' . $user->name . '/' . $user->email . '/' . $user->id);
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return $this->responseHelper->response('true', 'Got User', User::where('id', auth()->user()->id)->with('profile')->first(), 200);
    }

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $users = User::with('profile')->paginate(15);
        return $this->responseHelper->response('true', 'All Users', $users, 200);
    }

    /**
     * @param UpdateProfileRequest $request
     * @return JsonResponse
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $updateProfile = $this->userService->updateProfile($request->all());

        if ($request->profile_image) {
            $file_path = 'profile-images/' . auth()->user()->id . '/' . random_int(0, 999999999999) . time() . '.png';
            $saveImage = $this->base64ImageHelper->saveImage($request->profile_image, $file_path);

            $updateProfile->profile_image = $saveImage;
            $updateProfile->save();
        }

        return $this->responseHelper->response('true', 'Updated Profile', $updateProfile, 200);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getUserProfile(int $id): JsonResponse
    {
        $profile = User::where('id', $id)->with('profile')->first();
        return $this->responseHelper->response('true', 'Got Profile', $profile, 200);
    }

    /**
     * @param SearchUserRequest $request
     * @return JsonResponse
     */
    public function searchUser(SearchUserRequest $request)
    {
        $results = User::where('name', 'like', '%' . $request->search_term . '%')->with('profile')->paginate(15);
        return $this->responseHelper->response('true', 'Found Results', $results, 200);
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        auth()->logout();
        return Redirect::to('/');
    }
}
