<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Api\ApiRepository;
use App\Contracts\Api\V1\UserCategoryInterface;

class UserCategoryRepository extends ApiRepository implements UserCategoryInterface
{
    /**
     *
     *
     *
     */
    public function getAllCategories()
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
    public function getCategory($category_key)
    {
        $categories = $this->user->categories();

        if ($this->with) {
            $categories->with($this->with);
        }

        return $categories->where('key', $category_key)->paginate($this->per_page);
    }
}
