<?php

namespace App\Models;

use App\Helpers\Util\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DateTimeInterface;

trait BaseModelTrait
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check() && isset($model->created_by)) {
                $model->created_by = Auth::user()->name;
            }
            if (isset($model->tell)) {
                $model->tell = Helper::convertFormatPhone($model->tell);
            }

        });

        static::updating(function ($model) {
            if (Auth::check() && isset($model->updated_by)) {
                $model->updated_by = Auth::user()->name;
            }
            if (isset($model->tell)) {
                $model->tell = Helper::convertFormatPhone($model->tell);
            }
        });
    }

    /**
     * 書式変換を行う
     * https://laravel.com/docs/7.x/eloquent-serialization
     * 2022-07-24T11:22:08.000000Z -> 2022-07-24 18:22:08　
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
