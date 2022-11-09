<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectedInfo extends Model
{

    protected $table = 'connected_info';
    public $timestamps = false;
    protected $fillable = ['continent','country','region','regionName','city', 'district', 'zip','lat','lon','isp','org','reverse','query'];
    protected $primaryKey = 'query';

    /**
     * 顧客アクセス行動を登録する
     * @param array $param
     * @return void
     */
    public static function putConnectedInfo(array $param)
    {
        $b = ConnectedInfo::where('query', $param['query']);
        if ($b->count()) {
            $b->update($param);
        } else {
            ConnectedInfo::create($param);
        }
    }
}
