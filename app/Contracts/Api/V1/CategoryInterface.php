<?php

namespace App\Contracts\Api\V1;

interface CategoryInterface
{
    public function getAllCategories();
    public function getCategory($category_key);
}
