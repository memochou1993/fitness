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
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
