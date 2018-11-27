<?php

namespace App\Helpers;

class Helper
{
    /**
     *
     *
     *
     */
    public static function response($success, $data, $errors = null) {
        return response([
            'success' => $success,
            'data' => $data,
            'errors' => $errors,
        ]);
    }
}
