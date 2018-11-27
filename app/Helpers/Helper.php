<?php

namespace App\Helpers;

class Helper
{
    /**
     *
     *
     *
     */
    public static function response($success, $errors) {
        return response([
            'success' => $success,
            'data' => [],
            'errors' => $errors,
        ]);
    }
}
