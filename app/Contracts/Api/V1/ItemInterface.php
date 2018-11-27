<?php

namespace App\Contracts\Api\V1;

interface ItemInterface
{
    public function getItem($item_key);
}
