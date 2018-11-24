<?php

return [

    'user' => [
        'add_default_role_on_register' => true,
        'default_role'                 => 'user',
        'namespace'                    => null,
        'default_avatar'               => 'users/default.png',
        'redirect'                     => '/admin',
    ],

    'controllers' => [
        'namespace' => 'TCG\\Voyager\\Http\\Controllers',
    ],

    'models' => [
        // 'namespace' => 'App\\',
    ],

    'assets_path' => '/vendor/tcg/voyager/assets',

    'storage' => [
        'disk' => 'public',
    ],

    'hidden_files' => false,

    'database' => [
        'tables' => [
            'hidden' => [
                'migrations', 'data_rows', 'data_types', 'menu_items', 'password_resets', 'permission_role', 'settings'
            ],
        ],
    ],

    'multilingual' => [
        'enabled' => false,

        'rtl' => false,

        'default' => 'en',

        'locales' => [
            'en',
            // 'pt',
        ],
    ],

    'dashboard' => [
        'navbar_items' => [
            'Profile' => [
                'route'      => 'voyager.profile',
                'classes'    => 'class-full-of-rum',
                'icon_class' => 'voyager-person',
            ],
            'Home' => [
                'route'        => '/',
                'icon_class'   => 'voyager-home',
                'target_blank' => true,
            ],
            'Logout' => [
                'route'      => 'voyager.logout',
                'icon_class' => 'voyager-power',
            ],
        ],

        'widgets' => [
            'TCG\\Voyager\\Widgets\\UserDimmer',
            'App\\Widgets\\ItemDimmer',
        ],

    ],

    'bread' => [
        'add_menu_item' => true,

        'default_menu' => 'admin',

        'add_permission' => true,

        'default_role' => 'admin',
    ],

    'primary_color' => '#22A7F0',

    'show_dev_tips' => true,

    'additional_css' => [
        // 'css/custom.css',
    ],

    'additional_js' => [
        // 'js/custom.js',
    ],

    'googlemaps' => [
        'key'    => env('GOOGLE_MAPS_KEY', ''),
        'center' => [
            'lat' => env('GOOGLE_MAPS_DEFAULT_CENTER_LAT', '32.715738'),
            'lng' => env('GOOGLE_MAPS_DEFAULT_CENTER_LNG', '-117.161084'),
        ],
        'zoom' => env('GOOGLE_MAPS_DEFAULT_ZOOM', 11),
    ],

];
