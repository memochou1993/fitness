<?php

namespace App\Contracts;

interface ItemInterface
{
    public function getItemsByUser();
    public function getItemByItemKey($item_key);
    public function getItemUsersByItemKey($item_key);
}
