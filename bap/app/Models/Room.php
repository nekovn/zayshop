<?php

namespace App\Models;

use App\Enums\CodeDefine;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    use BaseModelTrait;

    protected $guarded = ['id', 'created_at', 'updated_at', 'created_by', 'updated_by'];
    protected $table = 'room';
    protected $appends = ['status_name', 'hot_name', 'exists_name', 'district_name', 'room_name', 'star_name', 'image_name', 'space_room_name', 'space_share_name', 'utility_room_name', 'button'];
    protected $hidden = ['district', 'room', 'star', 'hot', 'status', 'spaceRoom', 'spaceShare', 'imageRoom', 'status', 'exist'];


    public function getButtonAttribute()
    {
        return config('app-settings-admin.tbodyBtn.room');
    }

    public function getStatusNameAttribute()
    {
        return isset($this->status) ? $this->status->value : '';
    }

    public function getHotNameAttribute()
    {
        return isset($this->hot) ? $this->hot->value : '';
    }

    public function getExistsNameAttribute()
    {
        return $this->exists ? __('global.S.exist.rom') : __('global.S.not.exist.rom');
    }


    public function getDistrictNameAttribute()
    {
        return isset($this->district) ? $this->district->value : '';
    }

    public function getStarNameAttribute()
    {
        return isset($this->star) ? $this->star->value : '';
    }

    public function getRoomNameAttribute()
    {
        return isset($this->room) ? $this->room->value : '';
    }

    public function getSpaceRoomNameAttribute()
    {
        return isset($this->spaceRoom) ? $this->spaceRoom : '';
    }

    public function getSpaceShareNameAttribute()
    {
        return isset($this->spaceShare) ? $this->spaceShare : '';
    }

    public function getUtilityRoomNameAttribute()
    {
        return isset($this->utilityRoom) ? $this->utilityRoom : '';
    }

    public function getImageNameAttribute()
    {
        return isset($this->imageRoom) ? $this->imageRoom : '';
    }

    public function district()
    {
        return $this->belongsTo(CodeValue::class, 'district_id', 'key')->where('code_id', CodeDefine::CODE_DISTRICT);
    }

    public function room()
    {
        return $this->belongsTo(CodeValue::class, 'room_id', 'key')->where('code_id', CodeDefine::CODE_ROOM);
    }

    public function star()
    {
        return $this->belongsTo(CodeValue::class, 'star_id', 'key')->where('code_id', CodeDefine::CODE_STAR);
    }

    public function hot()
    {
        return $this->belongsTo(CodeValue::class, 'hot_id', 'key')->where('code_id', CodeDefine::CODE_HOT);
    }

    public function status()
    {
        return $this->belongsTo(CodeValue::class, 'status_id', 'key')->where('code_id', CodeDefine::CODE_STATUS);
    }

    public function spaceRoom()
    {
        return $this->belongsToMany(Utilities::class, 'room_utilities', 'room_id', 'utilities_id')
            ->select(['name', 'utilities.id'])
            ->where('code', CodeDefine::SPACE_ROOM);
    }

    public function spaceShare()
    {
        return $this->belongsToMany(Utilities::class, 'room_utilities', 'room_id', 'utilities_id')
            ->select(['name', 'utilities.id'])
            ->where('code', CodeDefine::SPACE_SHARE);
    }

    public function utilityRoom()
    {
        return $this->belongsToMany(Utilities::class, 'room_utilities', 'room_id', 'utilities_id')
            ->select(['name', 'utilities.id'])
            ->where('code', CodeDefine::UTILITY_ROOM);
    }

    public function imageRoom()
    {
        return $this->hasMany(ImageRoom::class, 'room_id', 'id');
    }


}
