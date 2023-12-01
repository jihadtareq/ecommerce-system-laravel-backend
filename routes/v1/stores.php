<?php
Route::prefix('stores')->middleware(['auth:api','merchantCheck'])->group(function () {
        Route::get('/','StoreController@index');
        Route::post('/','StoreController@create');
        Route::get('/{store}','StoreController@show');

});