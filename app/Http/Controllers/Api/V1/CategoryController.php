<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CategoryCollection;
use App\Contracts\Api\V1\CategoryInterface;
use App\Http\Controllers\Api\ApiController;

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
    public function __construct(CategoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_key
     * @return \App\Http\Resources\CategoryCollection
     */
    public function show($category_key)
    {
        return new CategoryCollection($this->repository->getCategory($category_key));
    }
}
