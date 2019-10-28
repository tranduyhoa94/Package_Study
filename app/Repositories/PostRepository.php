<?php

namespace App\Repositories;

use Ky\Core\Repositories\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository
{
    /**
     * Get the model of repository
     *
     * @return string
     */
    public function getModel()
    {
        return Post::class;
    }
}
