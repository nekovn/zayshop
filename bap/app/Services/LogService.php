<?php

namespace App\Services;

use App\Repositories\LogRepository;

class LogService
{
    use BaseServiceTrait;
    public $repository;

    public function __construct(LogRepository $logRepository)
    {
        $this->repository = $logRepository;
    }
}
