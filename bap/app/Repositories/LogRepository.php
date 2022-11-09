<?php

namespace App\Repositories;
use App\Models\LogInfo;

class LogRepository
{
    use BaseRepositoryTrait;

    protected function getModel()
    {
        return LogInfo::where([]);
    }
}
