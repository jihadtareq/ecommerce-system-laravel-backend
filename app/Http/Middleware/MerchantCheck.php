<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserType;

class MerchantCheck
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
        if(Auth::user()->getType() != UserType::MERCHANT)
        {
            return response()->json(['message' => 'failed', 'error'=> 'not_merchant'], 403);
        }elseif(!Auth::user()){
            return response()->json(['message' => 'failed', 'error'=> 'unauthanticated'], 401);
        }

        return $next($request);
    }
}
