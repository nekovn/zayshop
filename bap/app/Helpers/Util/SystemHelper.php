<?php

namespace App\Helpers\Util;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class SystemHelper
{

    public static function getActiveGuardName()
    {
        //AuthenticationModelTraitの中に、activeGuardを設定がある
        return Auth::check() ? Auth::user()->activeGuard():'';
    }

    /**
     * @param string $msg_cd
     * @param $parameters
     * @return string
     */
    public static function getMessage(string $msg_cd, $parameters = []):string
    {
        return self::bindParameter(Lang::get($msg_cd), $parameters);
    }

    /**
     * 文字列のパラメータ部にバインドパラメータを設定する。
     * @param string $source
     * @param array $parameters
     * @return string
     * ex: self::getMessage('messages.W.search.count.limit.over', ['count' => $limit]);
     */
    public static function bindParameter(string $source, array $parameters = []): string
    {
        //該当件数が多すぎます。<br>:count件以下となるように、検索条件を指定して再検索を行ってください。
        $string  = $source;
        if (empty($parameters)) {
            return $string;
        }
        foreach ($parameters as $key => $value) {
            $string = str_replace(":{$key}", $value, $string);
        }

        return $string;
    }

}
