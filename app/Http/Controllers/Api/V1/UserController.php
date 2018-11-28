<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Response;
use App\Http\Resources\UserCollection;
use App\Contracts\Api\V1\UserInterface;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    /**
     *
     */
    protected $repository;

    /**
     *
     *
     *
     */
    public function __construct(UserInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Response::success($this->repository->getUser());
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }
}
