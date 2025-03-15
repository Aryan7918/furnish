<?php

namespace App\Helpers;

class Reply
{
    /**
     * Return a success response with a message only.
     */
    public static function success($message = 'Success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
        ], 200);
    }

    /**
     * Return a success response with a message and data.
     */
    public static function successWith($message, $data = [])
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    /**
     * Return a success response with a message, data, and custom status code.
     */
    public static function successWithStatus($message, $data = [], $status = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * Return an error response with a message only.
     */
    public static function error($message = 'Error')
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], 400);
    }

    /**
     * Return an error response with a message and data (errors).
     */
    public static function errorWith($message, $errors = [])
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], 400);
    }

    /**
     * Return an error response with a message, errors, and custom status code.
     */
    public static function errorWithStatus($message, $errors = [], $status = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
