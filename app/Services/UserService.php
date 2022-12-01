<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    /**
     * @var UserRepositoryContract
     */
    protected $userRepository;

    /**
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createUser(array $data): Model
    {
        if (isset($data['uuid'])) {
            $user = $this->userRepository->createUserFacebook($data);
        } else {
            $user = $this->userRepository->createUser($data);
        }

        $this->userRepository->createProfile($user->id);

        return $user;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function updateProfile(array $data): Model
    {
        $userId = auth()->user()->id;
        return $this->userRepository->updateProfile($data, $userId);
    }

    /**
     * @param Model $user
     * @return Model
     */
    public function getUserProfile(model $user): Model
    {
        return $this->userRepository->getUserProfile($user->id);
    }

}
