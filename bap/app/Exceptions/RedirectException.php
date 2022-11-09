<?php

namespace App\Exceptions;
use Throwable;
use Exception;

/**
 * アプリケーション例外
 *
 * @category  システム共通
 * @package   App\Exceptions\database
 * @version   1.0
 */

class RedirectException extends Exception
{

    public $redirectTo;
    public $message;

    /**
     * コンストラクタ
     *
     * @param string $message 簡易エラーメッセージ
     * @param string $redirectTo ステータスコード
     */
    public function __construct(string $redirectTo, string $message = '')
    {
        # リダイレクトさせたい場所を指定。
        $this->redirectTo = $redirectTo;
        # リダイレクト先で表示するメッセージを指定。
        $this->message = $message;
    }

}
