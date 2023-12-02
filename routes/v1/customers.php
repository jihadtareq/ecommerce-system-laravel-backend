<?php
Route::prefix('customers')->group(function(){
    Route::apiResource('/','CustomerController');
});