<?php

namespace App\Contracts;

interface ItemInterface
{
    public function getItemsByUserId($user_id);
}
