<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    require_once(__DIR__.'/v1/users.php');
    require_once(__DIR__.'/v1/login.php');
    require_once(__DIR__.'/v1/stores.php');
    require_once(__DIR__.'/v1/products.php');
    require_once(__DIR__.'/v1/carts.php');
    require_once(__DIR__.'/v1/customers.php');
});