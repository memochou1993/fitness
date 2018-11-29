<?php

namespace App\Helpers;

class Response extends Helper
{
    /**
     *
     *
     *
     */
    public static function success($data, $status = 200) {
        return response([
            'status' => 'success',
            'data' => $data,
        ], $status);
    }

    /**
     *
     *
     *
     */
    public static function fail($data, $status = 400) {
        return response([
            'status' => 'fail',
            'data' => $data,
        ], $status);
    }

    /**
     *
     *
     *
     */
    public static function error($message, $status = 500) {
        return response([
            'status' => 'error',
            'message' => $message,
        ], $status);
    }
}
