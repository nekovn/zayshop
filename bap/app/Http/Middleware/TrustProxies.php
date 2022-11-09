<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     * TrustProxies: Dùng cho load balance, liệt danh sách proxy tin tưởng.
     * https://viblo.asia/p/kham-pha-ve-cac-middleware-duoc-su-dung-o-kernel-cua-laravel-Do754JLeZM6
     * @var array|string
     */
//    /**
//     * このアプリケーションで信用するプロキシ
//     *
//     * @var array
//     */
//    protected $proxies = [
//        '192.168.1.1',
//        '192.168.1.2',
//    ];

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
