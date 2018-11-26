<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserResource;
use App\Contracts\Api\V1\UserInterface;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    /**
     *
     */
    protected $users;

    /**
     *
     *
     *
     */
    public function __construct(UserInterface $users)
    {
        parent::__construct();

        $this->users = $users;
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
        return response([
            'data' => $this->users->getUser(),
        ]);
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
