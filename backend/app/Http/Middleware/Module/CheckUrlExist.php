<?php

namespace App\Http\Middleware\Module;

use App\Models\UrlShortener;
use Closure;
use Illuminate\Http\Request;
use App\Models\UserModules;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUrlExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $existingUrl = UrlShortener::where("id", $request["id"])
            ->first();

        if (!$existingUrl) {
            return response([
                "error" => "Not found!"
            ], 404);
        }
        return $next($request);
    }
}
