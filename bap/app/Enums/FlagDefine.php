<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class FlagDefine extends Enum implements DefineInterface
{
    const ON = '1';
    const OFF = '0';

    /**
     * クライアントに返すkey-valueの定数固有を取得する
     * @return array
     */
    public static function getKeyValue(): array
    {
        return [
            'ON' => self::ON,
            'OFF' => self::OFF
        ];
    }

    /**
     * クライアントに返す定数固有のメソッドを取得する
     * @return array
     */
    public static function getMethods(): array
    {
        $on = self::ON;
        $off = self::OFF;
        return [
          'isOn'  => "function(value) { return value == {$on} }",
          'isOff' => "function(value) { return value == {$off} }"
        ];

    }


}
