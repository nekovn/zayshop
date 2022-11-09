<?php

namespace App\Http\Middleware;

use App\Models\ConnectedInfo;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class IPFirewall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ipLocal = config('services.ip.key');
        $ip = $request->ip() === '::1' ? $ipLocal : $request->ip();

        Cache::remember("firewall_$ip", 3600, function() use ($ip) {
//            $url = "http://api.ipapi.com/::1?access_key=$key";
            $url = "http://ip-api.com/json/$ip?fields=1636093&lang=en";
            $client = new Client;
            $response = $client->request('GET', $url);
            $data = json_decode((string) $response->getBody(), true);
            if($data['status'] == 'success') {
                $credentials = Arr::except($data, ['status']);
                ConnectedInfo::putConnectedInfo($credentials);
            }
        });

        return $next($request);
    }
}
