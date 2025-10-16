<?php

namespace App\Http\MiddlewareModule\Module;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserModules;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $moduleId = $request["id"];
        $user = Auth::user();

        $existingUserModule = UserModules::where("user_id", $user->id)
            ->where("module_id", $moduleId)
            ->first();

        if ($existingUserModule["active"] == 0 )
        {
            return response([
                "error" => "Module inactive. Please activate this module to use it."
            ], 403);
        }

        return $next($request);
    }
}
