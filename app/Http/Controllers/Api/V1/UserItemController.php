<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserItemCollection as Collection;
use App\Http\Requests\Api\V1\UserItemRequest as Request;
use App\Contracts\Api\V1\UserItemInterface as Repository;

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
     * @return \App\Http\Resources\Collection
     */
    public function index()
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return new Collection($this->repository->getAllItems());
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
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        return Response::success($this->repository->postItem(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\Collection
     */
    public function show($item_key)
    {
        if ($this->errors) {
            return response(
                [
                    'errors' => $this->errors
                ]
            );
        }

        try {
            return new Collection($this->repository->getItem($item_key));
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
