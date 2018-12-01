<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserCategoryCollection as Collection;
use App\Http\Requests\Api\V1\UserCategoryRequest as Request;
use App\Contracts\Api\V1\CategoryInterface as Repository;

class UserCategoryController extends ApiController
{
    /**
     *
     */
    protected $repository;

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
            return new Collection($this->repository->getAllUserCategories());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_key
     * @return \App\Http\Resources\Collection
     */
    public function show($category_key)
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return new Collection($this->repository->getUserCategory($category_key));
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update($category_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        //
    }
}
