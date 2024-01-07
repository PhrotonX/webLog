<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

/*Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/pages/{type?}/{title?}', [PageController::class,  'loadPage'])->name('pages.navigate');

Route::get('/test/{id}', function($id){
    $data = [
        'id' => $id
    ];
    return view('test', $data);
});

require __DIR__.'/auth.php';
