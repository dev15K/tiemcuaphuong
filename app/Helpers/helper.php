<?php

use App\Models\Setting;

if (!function_exists('returnMessage')) {
    /**
     * @param int $type
     * @param mixed $data
     * @param string $message
     * @return array
     */
    function returnMessage(int $type, mixed $data, string $message): array
    {
        if ($type === 1) {
            $data = [
                'type' => 'success',
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ];
        } else {
            $data = [
                'type' => 'error',
                'status' => 'error',
                'message' => $message,
                'data' => $data,
            ];
        }

        return $data;
    }
}

if (!function_exists('setting')) {
    function setting()
    {
        if (Schema::hasTable('settings')) {
            return Setting::first();
        }

        return null;
    }
}
