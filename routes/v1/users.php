<?php
Route::prefix('users')->group(function(){
    Route::post('/register','UserController@register');
    
    Route::group(['middleware' => ['auth:api','userCheck']], function () {
        Route::get('/','UserController@index');
        Route::get('/{userId}','UserController@show');
        // Route::delete('/delete','UserController@destory');
        // Route::patch('/update-info','UserController@update');
    });
});