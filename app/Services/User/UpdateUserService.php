<?php

namespace App\Services\User;
use App\Repositories\UserRepository;
use Ky\Core\Services\BaseService;

class UpdateUserService extends BaseService
{
    protected $collectsData = true;
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Logic to handle the data
     */
    public function handle()
    {
        $this->model->fill($this->data);
        $this->model->save();

        return $this->model;
    }
}
