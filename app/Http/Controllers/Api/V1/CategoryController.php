<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CategoryResource;
use App\Contracts\Api\V1\CategoryInterface;
use App\Http\Controllers\Api\ApiController;

class CategoryController extends ApiController
{
    /**
     *
     */
    protected $categories;

    /**
     *
     *
     *
     */
    public function __construct(CategoryInterface $categories)
    {
        parent::__construct();

        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return CategoryResource::collection(
                $this->categories->getAllCategories()
            );
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'errors' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_key
     * @return \Illuminate\Http\Response
     */
    public function show($category_key)
    {
        try {
            return CategoryResource::collection(
                $this->categories->getCategory($category_key)
            );
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
