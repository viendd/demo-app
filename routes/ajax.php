<?php

use App\Http\Controllers\Admin\Ajax\CategoryApiController;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'namespace' => 'Admin\Ajax',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function (){
    Route::group([
        'prefix' => 'category',
    ], function (){
        Route::post('/delete/{id}', [CategoryApiController::class, 'delete'])->name('category.delete');
    });

});
