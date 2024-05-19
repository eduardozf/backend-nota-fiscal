<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('nota-fiscal')->group(function () {
    Route::get('/{key}', function ($key) {
        echo('Pesquisando chave:'.$key);
        return;
    });
    Route::post('/', function () {
        echo('p');
        return;
    });
});
