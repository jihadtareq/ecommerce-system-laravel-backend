<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guard('api')->user()){
            $request->merge(['user'=>new UserResource(auth()->guard('api')->user())]);
            if(!auth()->guard('api')->user())
                return response()->json(['message' => 'failed', 'error'=> 'unauthanticated'], 401);
        }

        return $next($request);
    }
}
