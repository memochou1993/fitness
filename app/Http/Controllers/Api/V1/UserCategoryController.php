<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Response;
use App\Http\Resources\UserCategoryCollection;
use App\Contracts\Api\V1\UserCategoryInterface;
use App\Http\Controllers\Api\ApiController;

class UserCategoryController extends ApiController
{
    /**
     *
     */
    protected $user_categories;

    /**
     *
     *
     *
     */
    public function __construct(UserCategoryInterface $user_categories)
    {
        parent::__construct();

        $this->user_categories = $user_categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserCategoryCollection
     */
    public function index()
    {
        try {
            return new UserCategoryCollection($this->user_categories->getAllCategories());
        } catch (\Exception $e) {
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
            return new UserCategoryCollection($this->user_categories->getCategory($category_key));
        } catch (\Exception $e) {
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
