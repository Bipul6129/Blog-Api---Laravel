<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
        $apiKey = $req->header('Authorization');
        if (!$apiKey) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $apiKey = trim(str_ireplace('Bearer', '', $apiKey));
        $validKey = $apiKey === config('api.api_key');
        if (!$validKey) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($req);
    }
}
