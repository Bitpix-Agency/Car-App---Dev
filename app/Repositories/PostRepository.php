<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostRepositoryContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function newPost(array $data): Model
    {
        $newPost = new Post();
        $newPost->user_id = auth()->user()->id;
        $newPost->fill($data);
        $newPost->save();

        return $newPost;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function updatePost(array $data, int $id): Model
    {
        $post = $this->findPostById($id);

        $post->fill($data);
        $post->save();
        return $post;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findPostById(int $id): Model
    {
        return Post::find($id);
    }

}
