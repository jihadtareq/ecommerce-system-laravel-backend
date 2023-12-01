<?php

Route::prefix('login')->group(function(){
   Route::post('/','LoginController@login');
});