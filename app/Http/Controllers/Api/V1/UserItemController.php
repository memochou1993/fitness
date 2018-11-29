<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Resources\UserItemCollection;
use App\Contracts\Api\V1\UserItemInterface;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\UserItemRequest;

class UserItemController extends ApiController
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
     *
     *
     */
    public function __construct(UserItemInterface $repository, UserItemRequest $request)
    {
        parent::__construct();

        $this->repository = $repository;

        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserItemCollection
     */
    public function index()
    {
        if ($this->request->validator) {
            return Response::fail($this->request->validator->errors());
        }

        try {
            return new UserItemCollection($this->repository->getAllItems());
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if ($this->request->validator) {
            return Response::fail($this->request->validator->errors());
        }

        return Response::success($this->repository->postItem(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\UserItemCollection
     */
    public function show($item_key)
    {
        if ($this->request->validator) {
            return Response::fail($this->request->validator->errors());
        }

        try {
            return new UserItemCollection($this->repository->getItem($item_key));
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $item_id
     * @return \Illuminate\Http\Response
     */
    public function update($item_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $item_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
        //
    }
}
