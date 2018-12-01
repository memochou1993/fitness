<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CategoryResource as Resource;
use App\Contracts\Api\V1\CategoryInterface as Repository;

class CategoryController extends ApiController
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
    public function __construct(Repository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_key
     * @return \App\Http\Resources\Resource
     */
    public function show($category_key)
    {
        return Resource::collection($this->repository->getCategory($category_key));
    }
}
