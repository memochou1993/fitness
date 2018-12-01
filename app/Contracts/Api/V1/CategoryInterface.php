<?php

namespace App\Contracts\Api\V1;

interface CategoryInterface
{
    public function getCategory($category_key);
    public function getAllUserCategories();
    public function getUserCategory($category_key);
}
