<?php

namespace App\Contracts\Api\V1;

interface UserInterface
{
    public function getAllUsers();
    public function getUser($user_key);
}
