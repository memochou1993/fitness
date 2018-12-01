<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\RecordResource as Resource;
use App\Http\Requests\Api\V1\RecordRequest as Request;
use App\Contracts\Api\V1\RecordInterface as Repository;

class UserRecordController extends ApiController
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
            return Resource::collection($this->repository->getAllUserRecords());
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

        return Response::success($this->repository->postUserRecord(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\Resource
     */
    public function show($item_key)
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return Resource::collection($this->repository->getUserRecord($item_key));
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $item_key
     * @return \Illuminate\Http\Response
     */
    public function update($item_key)
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        return ($this->repository->putUserRecord($item_key)) ? Response::success(null, 204) : Response::fail(null, 403);
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
