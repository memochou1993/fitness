<?php

namespace App\Contracts\Api\V1;

interface UserItemInterface
{
    public function getAllItems();
    public function getItem($item_key);
    public function postItem();
}
