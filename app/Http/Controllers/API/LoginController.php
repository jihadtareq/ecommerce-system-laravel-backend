<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{

    public function login(LoginRequest $request,LoginService $loginService)
    {
        try {
            $user = $loginService->getToken($request->all());

            return response()->json(['message'=>'success','data'=>$user],200);
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);

        }
        
    }
    
}
