<?php

namespace App\Repositories;

use Ky\Core\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * Get the model of repository
     *
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * Get allow relations
     *
     * @return array
     */
    public function getAllowRelations()
    {
        return [
            'posts'
        ];
    }
}
