<?php

namespace App\Helpers\Util;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{
    /**
     * (32) 1321-3123 -> 3232131231
     * @param $value
     * @return string|string[]|null
     */

    static function convertFormatPhone($value)
    {
        return $value ? str_replace(["(", ")", "-", " "], "", $value) : null;
    }

    /**
     * 1231232131 -> 1231-232-131
     * @param $value
     * @return array|string|string[]|null
     */
    static function addDashesToPhone($value)
    {
        return preg_replace("/^(\d{4})(\d{3})(\d{3,4})$/", "$1-$2-$3", $value);
    }

    static function deleteOldImage($path, $disk, $oldImage)
    {
        if ($oldImage) {
            Storage::disk($disk)->delete($path . '/' . $oldImage);
        }
    }

    /**
     * ['room_name' => 'A01'] => ['room_id' => 'A01']
     * @param $array
     * @param $keyName
     * @return mixed
     */
    static function changeKeyNameInArray($array, $keyName)
    {
        foreach ($array as $key => $value) {
            if($key && $value) {
                if (array_key_exists($key, $keyName)) {
                    $keyNew = $keyName[$key];
                    $array[$keyNew] = $value;
                    unset($array[$key]);
                }
            }

        }
        return $array;
    }
}
