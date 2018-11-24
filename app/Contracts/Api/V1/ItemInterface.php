<?php

namespace App\Contracts\Api\V1;

interface ItemInterface
{
    public function getAllItems();
    public function getItem($item_key);
}
