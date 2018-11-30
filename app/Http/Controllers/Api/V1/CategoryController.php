<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\CategoryCollection as Collection;
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
     * @return \App\Http\Resources\Collection
     */
    public function show($category_key)
    {
        return new Collection($this->repository->getCategory($category_key));
    }
}
