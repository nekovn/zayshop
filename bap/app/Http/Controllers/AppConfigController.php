<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AppConfigService;

class AppConfigController extends Controller
{
    public function __construct(AppConfigService $appConfigService)
    {
        $this->service = $appConfigService;
    }

    public function index()
    {
        $config = $this->service->getData();
        header('Content-Type: text/javascript');
        echo ('window.fw = '. json_encode($config). ';');
        exit();
    }

}
