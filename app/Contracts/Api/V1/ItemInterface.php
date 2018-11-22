<?php

namespace App\Contracts\Api\V1;

interface ItemInterface
{
    public function getAllItems($item_key);
}
