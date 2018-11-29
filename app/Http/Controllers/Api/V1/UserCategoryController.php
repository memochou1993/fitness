<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Helpers\Response;
use App\Http\Resources\UserCategoryCollection;
use App\Contracts\Api\V1\UserCategoryInterface;
use App\Http\Controllers\Api\ApiController;

class UserCategoryController extends ApiController
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
    public function __construct(UserCategoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserCategoryCollection
     */
    public function index()
    {
        try {
            return new UserCategoryCollection($this->repository->getAllCategories());
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
     * @return \App\Http\Resources\UserCategoryCollection
     */
    public function show($category_key)
    {
        try {
            return new UserCategoryCollection($this->repository->getCategory($category_key));
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
