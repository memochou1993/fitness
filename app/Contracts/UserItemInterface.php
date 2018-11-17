<?php

namespace App\Contracts;

interface UserItemInterface
{
    public function getUserItemsByUserId($user_id);
}
