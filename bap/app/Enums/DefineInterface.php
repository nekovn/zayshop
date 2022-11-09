<?php

namespace App\Enums;

interface DefineInterface
{

    /**
     * クライアントに返すkeyとvalueの定数情報を取得する。
     * @return array
     */
    public static function getKeyValue(): array;
    /**
     * クライアントに返す定数固有のmethods を取得する。
     * @return array
     */
    public static function getMethods(): array;

}
