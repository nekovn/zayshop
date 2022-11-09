<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBehavior extends Model
{
    public $timestamps = false;
    protected $fillable = ['customer_id','useragent','last_logined_at','logined_ip'];
    protected $primaryKey = 'customer_id';
    protected $table = 'customer_behaviors';

    /**
     * 顧客行動を登録する
     * @param array $param
     * @return void
     */

    public static function putBehavior(array $param)
    {
        $b = CustomerBehavior::where('customer_id', $param['customer_id']);
        if ($b->count()) {
            $b->update($param);
        } else {
            CustomerBehavior::create($param);
        }


    }


}
