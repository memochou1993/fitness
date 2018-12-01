<?php

namespace App\Contracts\Api\V1;

interface UserItemInterface
{
    public function getAllUserItems();
    public function getUserItem($Useritem_key);
    public function postUserItem();
    public function putUserItem($item_key);
}
