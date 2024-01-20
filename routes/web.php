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

/* POST */
//Route::post('/sampleinsert', DB::insert('INSERT INTO accounts(username, email, password_hash, age), '));
 
/* RESOURCES */
Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin', 'user' => 'member']]);
Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);

//@NOTE: Sample only! remove later.
//Route::get('user/create/{age}', 'App\Http\Controllers\UserController@create');



require __DIR__.'/auth.php';
