<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\FindUserRequest;
use App\Http\Requests\User\ListUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\FindUserService;
use App\Services\User\ListUserService;
use App\Services\User\UpdateUserService;

class UserController extends Controller
{
    /**
     * @var ListUsersService
     */
    protected $listService;
    /**
     * @var FindUserService
     */
    protected $findService;
    /**
     * @var CreateUserService
     */
    protected $createService;
    /**
     * @var UpdateUserService
     */
    protected $updateService;
    /**
     * @var DeleteUserService
     */
    protected $deleteService;

    public function __construct(
        ListUserService $listService,
        FindUserService $findService,
        CreateUserService $createService,
        UpdateUserService $updateService,
        DeleteUserService $deleteService
    ) {
        $this->listService = $listService;
        $this->findService = $findService;
        $this->createService = $createService;
        $this->updateService = $updateService;
        $this->deleteService = $deleteService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListUserRequest $request)
    {
        $users = $this->listService
            ->setRequest($request)
            ->handle();

        return response()->json(new UserCollection($users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->createService
            ->setRequest($request)
            ->handle();

        return response()->json(new UserResource($user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        $user = $this->findService
            ->setRequest($request)
            ->setModel($id)
            ->handle();

        $user = $this->updateService
            ->setRequest($request)
            ->setModel($user)
            ->handle();

        return response()->json(new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
