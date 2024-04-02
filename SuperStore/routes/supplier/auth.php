<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'supplier/'], function (){
    //test supplier login
    Route::post('login', function (){return ['token'=>'data'];});


});
