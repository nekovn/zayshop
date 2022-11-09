<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogInfo extends Model
{
    use BaseModelTrait;
    protected $fillable = ['message_code', 'file_line', 'screen', 'created_at'];
    protected $table = 'log_info';

    protected $appends = ['button'];

    public function getButtonAttribute()
    {
        return config('app-settings-admin.tbodyBtn.log');
    }

    /**
     * エラーがあれば、ログを記録する
     * @param $method
     * @param $line
     * @return void
     */
    public function createLog($exception, $method, $line, $screen)
    {
        $messages = $exception['message'];
        $code = $exception['code'];
        $values = [
            'message_code' => $messages . "_" . $code,
            'file_line' => $method . "_" . $line,
            'screen' => $screen,
        ];
        self::create($values);
    }
}
