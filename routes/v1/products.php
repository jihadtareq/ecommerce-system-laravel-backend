<?php
Route::prefix('products')->group(function(){
    Route::get('/','ProductController@index');
    Route::get('/{product}','ProductController@show');
    Route::group(['middleware' => ['auth:api','merchantCheck']], function () {
        Route::post('/','ProductController@create');
    });
});