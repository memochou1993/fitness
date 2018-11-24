<?php

namespace App\Contracts\Api\V1;

interface UserItemInterface
{
    public function getAllItems($user_key);
    public function getItem($user_key, $item_key);
}
