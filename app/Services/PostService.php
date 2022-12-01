<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class PostService
{
    /**
     * @var PostRepositoryContract
     */
    protected $postRepository;

    /**
     * PostService constructor.
     * @param PostRepositoryContract $postRepository
     */
    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newPost(array $data): Model
    {
        return $this->postRepository->newPost($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updatePost(array $data, int $id): Model
    {
        return $this->postRepository->updatePost($data, $id);
    }

}
