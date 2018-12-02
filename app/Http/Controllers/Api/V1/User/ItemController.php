<?php

namespace App\Http\Controllers\Api\V1\User;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\ItemResource as Resource;
use App\Http\Requests\Api\V1\ItemRequest as Request;
use App\Contracts\Api\V1\ItemInterface as Repository;

class ItemController extends ApiController
{
    /**
     *
     */
    protected $repository;

    /**
     *
     */
    protected $request;

    /**
     *
     */
    protected $errors;

    /**
     *
     *
     *
     */
    public function __construct(Repository $repository, Request $request)
    {
        parent::__construct();

        $this->repository = $repository;

        $this->request = $request;

        $this->errors = $this->request->validator ? $this->request->validator->errors() : null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Resource
     */
    public function index()
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return Resource::collection($this->repository->getAllUserItems());
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\Resource
     */
    public function show($item_key)
    {
        //
    }
}
