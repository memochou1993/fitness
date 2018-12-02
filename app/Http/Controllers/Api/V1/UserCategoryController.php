<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CategoryResource as Resource;
use App\Http\Requests\Api\V1\CategoryRequest as Request;
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
     * @return \App\Http\Resources\Resource
     */
    public function index()
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return Resource::collection($this->repository->getAllUserCategories());
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_key
     * @return \App\Http\Resources\Resource
     */
    public function show($category_key)
    {
        if ($this->errors) {
            return Response::fail($this->errors);
        }

        try {
            return Resource::collection($this->repository->getUserCategory($category_key));
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }
}
