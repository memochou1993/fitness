<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\RecordResource as Resource;
use App\Http\Requests\Api\V1\RecordRequest as Request;
use App\Contracts\Api\V1\RecordInterface as Repository;

class RecordController extends ApiController
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
     * Update the specified resource in storage.
     *
     * @param  string  $item_key
     * @return \Illuminate\Http\Response
     */
    public function update($item_key)
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
