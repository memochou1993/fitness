<?php

namespace App\Helpers;

class Response extends Helper
{
    /**
     *
     *
     *
     */
    public static function success($data) {
        return response([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    /**
     *
     *
     *
     */
    public static function fail($data) {
        return response([
            'status' => 'fail',
            'data' => $data,
        ]);
    }

    /**
     *
     *
     *
     */
    public static function error($message) {
        return response([
            'status' => 'error',
            'message' => $message,
        ]);
    }
}
