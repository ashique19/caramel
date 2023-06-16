<?php

use Illuminate\Http\Request;

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

// Route::middleware('cors')->get('/test', function (Request $request) {
//     return \Response::make( [1,2,3] , 200);
// });

Route::group(['middleware' => ['cors'], 'prefix' => 'pathao'], function() use ($router){
    
    Route::get('update', 'Pathao@updateFromCourier');
    
});