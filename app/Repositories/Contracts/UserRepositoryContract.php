<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

interface UserRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function createUser(array $data): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function createUserFacebook(array $data): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function createProfile(int $id): bool;

    /**
     * @param array $data
     * @param int $userId
     * @return Model
     */
    public function updateProfile(array $data, int $userId): Model;

    /**
     * @param int $userId
     * @return Model
     */
    public function getUserProfile(int $userId): Model;


}
