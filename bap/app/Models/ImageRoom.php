<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageRoom extends Model
{
    protected $table = 'room_image';
    protected $fillable = ['name'];
    protected $visible = ['name'];
    public $timestamps = false;
}
