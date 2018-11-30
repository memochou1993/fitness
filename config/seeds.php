<?php

return [

    /*
    |--------------------------------------------------------------------------
    |
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    'users' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test User',
        'sex' => 1,
        'age' => 25,
        'height' => 180,
        'weight' => 65,
        'email' => 'homestead@test.com',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ],

    'categories' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test Category',
    ],

    'items' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test Item',
        'unit' => '次',
    ],

    'conditions' => [
        'id' => 1,
        'key' => 'key',
        'date' => '2018-11-20',
        'weight' => 60.0,
    ],

    'user_item' => [
        'frequency' => 0.5,
        'completed' => false,
    ],

];
