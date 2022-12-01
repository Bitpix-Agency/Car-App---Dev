<?php

namespace App\Repositories\Contracts;
use Illuminate\Database\Eloquent\Model;

interface PostRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newPost(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updatePost(array $data, int $id): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function findPostById(int $id): Model;

}
