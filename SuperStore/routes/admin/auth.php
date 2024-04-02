<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/'], function (){
    //test admin login
    Route::post('login', function (){return ['token'=>'data'];});


});
