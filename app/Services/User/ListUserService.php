<?php

namespace App\Services\User;

use App\Repositories\UserRepository;
use Ky\Core\Services\BaseService;

class ListUserService extends BaseService
{
    protected $collectsData = true;

    protected $repository;

    protected $with = null;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Logic to handle the data
     */
    public function handle()
    {

    }
}
