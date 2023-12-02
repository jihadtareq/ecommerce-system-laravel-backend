<?php
Route::prefix('customers')->group(function(){
    Route::apiResource('/customer','CustomerController');
});