<?php

use Symfony\Component\HttpFoundation\Response;
use App\JorgezarDiceRoll\Rolls\Roll;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RollController@index'
    
);

Route::get('wodroll', 'RollController@roll'

);