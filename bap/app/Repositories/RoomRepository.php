<?php

namespace App\Repositories;
use App\Models\Room;

class RoomRepository
{
    use BaseRepositoryTrait;

    protected function getModel()
    {
        return Room::where([]);
    }
}
