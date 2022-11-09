<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCustomer extends Model
{
    protected $table = 'customers_image';
    protected $fillable = ['name'];
    protected $visible = ['name'];
    public $timestamps = false;

}
