<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;

class LogVistor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        // Get IP-based location info
        try {
            $geoData = Http::get("http://ip-api.com/json/{$ip}")->json();
        } catch (\Exception $e) {
            $geoData = [];
        }

        // Save visitor info in DB
        Visitor::create([
            'ip' => $ip,
            'user_agent' => $userAgent,
            'country' => $geoData['country'] ?? null,
            'region' => $geoData['regionName'] ?? null,
            'city' => $geoData['city'] ?? null,
            'latitude' => $geoData['lat'] ?? null,
            'longitude' => $geoData['lon'] ?? null,
        ]);

        return $next($request);
    }
}