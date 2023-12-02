<?php
Route::prefix('carts')->group(function(){
    Route::group(['middleware' => ['auth:api','userCheck']], function () {
        Route::post('/','CartController@create');
        Route::get('/{cartId}','CartController@show');
    });
});