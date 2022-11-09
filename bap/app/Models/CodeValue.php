<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeValue extends Model
{
    protected $table = 'code_values';
    protected $visible = ['id', 'code_id', 'value', 'key'];
}
