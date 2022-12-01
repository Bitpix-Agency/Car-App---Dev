<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacebookLoginRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->userService->createUser($request->all());

        $token = $user->createToken('trade')->accessToken;

        return $this->responseHelper->response(true, 'Added User', ['token' => $token], 200);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('trade')->accessToken;
            return $this->responseHelper->response(true, 'Logged In User', ['token' => $token], 200);
        } else {
            return $this->responseHelper->response(true, 'Invalid Login', [], 401);
        }
    }

    public function loginFacebook(FacebookLoginRequest $request): JsonResponse
    {
        $user = User::where('fb_id', $request->fb_id)->firstOrFail();

        if (auth()->loginUsingId($user->id)) {
            $token = auth()->user()->createToken('trade')->accessToken;
            return $this->responseHelper->response(true, 'Logged In User', ['token' => $token], 200);
        } else {
            return $this->responseHelper->response(true, 'Invalid Login', [], 401);
        }
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        $bytes = random_bytes(4);
        $newPass = bin2hex($bytes);

        $user = User::where('email', $request->email)->firstOrFail();
        $user->password = bcrypt($newPass);
        $user->save();

        \Mail::to($request->email)->queue(new ForgotPassword($newPass));

        return $this->responseHelper->response(true, "New Password Sent", [], 200);
    }
}
