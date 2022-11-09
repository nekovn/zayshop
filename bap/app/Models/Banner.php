<?php

namespace App\Models;

use App\Enums\CodeDefine;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use BaseModelTrait;
    protected $fillable = ['title', 'image', 'status'];
    protected $table = 'banner';
    protected $appends = ['status_name', 'button'];
    protected $hidden = ['status'];

    public function getButtonAttribute()
    {
        return config('app-settings-admin.tbodyBtn.banner');
    }

    public function getStatusNameAttribute()
    {
        return isset($this->status) ? $this->status->value : '';
    }

    public function status()
    {
        return $this->belongsTo(CodeValue::class, 'status_id', 'key')->where('code_id', CodeDefine::CODE_STATUS);
    }
}
