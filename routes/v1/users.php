<?php
Route::prefix('users')->group(function(){
    Route::post('/register','UserController@register');
    
    Route::group(['middleware' => ['auth:api','userCheck']], function () {
        Route::get('/','UserController@index');
        Route::get('/{user}/profile','UserController@show');
        Route::get('/profile','UserController@getLoggedUser');
        // Route::delete('/delete','UserController@destory');
        // Route::patch('/update-info','UserController@update');
    });
});