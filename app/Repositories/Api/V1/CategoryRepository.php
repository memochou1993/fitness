<?php

namespace App\Repositories\Api\V1;

use App\Category;
use App\Contracts\Api\V1\CategoryInterface;
use App\Repositories\Api\ApiRepository;

class CategoryRepository extends ApiRepository implements CategoryInterface
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
    public function __construct(Category $categories)
    {
        parent::__construct();

        $this->categories = $categories;
    }

    /**
     *
     *
     *
     */
    public function getCategory($category_key)
    {
        return $this->categories->where('key', $category_key)->paginate($this->per_page);
    }
}
