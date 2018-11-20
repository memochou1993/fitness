<?php

namespace App\Contracts;

interface ItemInterface
{
    public function getItemsByUser();
    public function getItemsByItemKey($item_key);
}
