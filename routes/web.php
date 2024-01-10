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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
*/

Route::name('submit')->middleware('check.age')->group(function(){
    Route::get('submit/create/{age?}', function(){
        //create.blade.php form submission function here...
        echo "/submit/create";
    })->name('create');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/pages/{type?}/{title?}', [PageController::class,  'loadPage'])->name('pages.navigate');
/* Single Invocation: */ //Route::get('/pages/{type}', 'PageController');

/*Route::get('/user/blogs/{blogTitle?}')*/

Route::get('test/{age?}', [PageController::class, 'loadTest'])->middleware('check.age');

/* RESOURCES */
Route::resource('user', 'App\Http\Controllers\UserController');

Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin']]);


Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);


require __DIR__.'/auth.php';
