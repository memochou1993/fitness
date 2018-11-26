<?php

namespace App\Contracts\Api\V1;

interface UserCategoryInterface
{
    public function getAllCategories();
    public function getCategory($category_key);
}
