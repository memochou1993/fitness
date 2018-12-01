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
            'data' => [
                $data,
            ],
        ], $status);
    }

    /**
     *
     *
     *
     */
    public static function fail($data, $status = 400) {
        return response([
            'data' => [
                $data,
            ],
        ], $status);
    }

    /**
     *
     *
     *
     */
    public static function error($message, $status = 500) {
        return response([
            'message' => [
                $message,
            ],
        ], $status);
    }
}
