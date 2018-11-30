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

    'user' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test User',
        'sex' => 0.5,
        'age' => 25,
        'height' => 180,
        'weight' => 65.0,
        'email' => 'homestead@test.com',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ],

    'category' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test Category',
    ],

    'item' => [
        'id' => 1,
        'key' => 'key',
        'name' => 'Test Item',
        'unit' => '次',
    ],

    'condition' => [
        'id' => 1,
        'key' => 'key',
        'date' => '2018-11-20',
        'weight' => 60.0,
    ],

    'user_item' => [
        'frequency' => 0.5
    ],

];
