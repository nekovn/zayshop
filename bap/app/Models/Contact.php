<?php

namespace App\Models;

use App\Enums\CodeDefine;
use App\Helpers\Util\Helper;
use Illuminate\Database\Eloquent\Model;



class Contact extends Model
{
    use BaseModelTrait;


    //Các column ko dc save khi update, created
//    protected $guarded = ['id', 'replied_at'];
    //Các column dc save khi update, created
    protected $fillable = ['client', 'email', 'tell', 'subject', 'textarea', 'status', 'code', 'contacted_at', 'replied_at', 'replied_content', 'replied_by'];
    protected $table = 'contact';
    const CREATED_AT = 'contacted_at';
    const UPDATED_AT = 'replied_at';

    protected $appends = ['status_name', 'button'];

//    protected $casts = [
//        'contacted_at' => 'date:Y-m-d h:i:s'
//        'is_admin' => 'boolean',
//    ];


    public function getButtonAttribute()
    {
        return config('app-settings-admin.tbodyBtn.contact');
    }
    /**
     * Statusを取得する
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return isset($this->status) ? $this->status->value : '';
    }

    /**
     * 1231232131 -> 1231-232-131
     * @param $value
     * @return array|string|string[]|null
     */
    public function getTellAttribute($value)
    {
        return $this->tell = Helper::addDashesToPhone($value);
    }

    /**
     * name -> Nameへ変換する
     * @param $value
     * @return string
     */
    public function getClientAttribute($value)
    {
        return ucfirst($value);
    }

    public function status()
    {
        return $this->belongsTo(CodeValue::class, 'status_id', 'key')->where('code_id', CodeDefine::CODE_STATUS);
    }
}
