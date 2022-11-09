<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'codes';
    protected $visible = ['code_value'];

    public function code_value(){
        return $this->hasMany(CodeValue::class, 'code_id','code');
    }
}
