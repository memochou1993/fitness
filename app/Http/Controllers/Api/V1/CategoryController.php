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
        return CategoryResource::collection(
            $this->categories->getAllCategories()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $category_key
     * @return \Illuminate\Http\Response
     */
    public function show($category_key)
    {
        return CategoryResource::collection(
            $this->categories->getCategory($category_key)
        );
    }
}
