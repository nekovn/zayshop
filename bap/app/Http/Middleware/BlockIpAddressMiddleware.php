<?php

namespace App\Http\Middleware;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlockIpAddressMiddleware
{
    /**
     * @var string[]
     */
    public $blacklistIps = [
        'russian',
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ipLocal = config('services.ip.key');
        $ip = $request->ip() === '::1' ? $ipLocal : $request->ip();
        $insecureRequest = Cache::remember("blacklist_$ip", 3600, function() use ($ip) {
            $url = "http://ip-api.com/json/$ip?fields=49153&lang=en";
            $client = new Client;
            $response = $client->request('GET', $url);
            $data = json_decode((string) $response->getBody(), true);

            if($data['status'] == 'success') {
                $country = strtolower($data['country']);
                if (in_array($country, $this->blacklistIps)) {
                    return true;
                }
            }
        });

        return $insecureRequest ? abort(403, "You are restricted to access the site.") : $next($request);
    }



}
