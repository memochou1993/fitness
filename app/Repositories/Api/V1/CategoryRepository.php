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
    protected $category;

    /**
     *
     *
     *
     */
    public function __construct(Category $category)
    {
        parent::__construct();

        $this->category = $category;
    }

    /**
     *
     *
     *
     */
    public function getCategory($category_key)
    {
        return $this->category->where('key', $category_key)->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getAllUserCategories()
    {
        $categories = $this->user->categories();

        if ($this->with) {
            $categories->with($this->with);
        }

        return $categories->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getUserCategory($category_key)
    {
        $categories = $this->user->categories();

        if ($this->with) {
            $categories->with($this->with);
        }

        return $categories->where('key', $category_key)->paginate($this->per_page);
    }
}
