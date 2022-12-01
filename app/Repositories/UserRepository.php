<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createUser(array $data): Model
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $user;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createUserFacebook(array $data): Model
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 20; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'uuid' => $data['uuid'],
            'password' => bcrypt($randomString)
        ]);

        return $user;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function createProfile(int $id): bool
    {
        $profile = new UserProfile();
        $profile->user_id = $id;
        $profile->save();

        return true;
    }

    /**
     * @param array $data
     * @param int $userId
     * @return Model
     */
    public function updateProfile(array $data, int $userId): Model
    {
        $profile = UserProfile::where('user_id', $userId)->first();
        $profile->fill($data);
        $profile->save();
        return $profile;
    }

    /**
     * @param int $userId
     * @return Model
     */
    public function getUserProfile(int $userId): Model
    {
        return UserProfile::where('user_id', $userId)->first();
    }

}
