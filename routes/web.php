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
use App\Http\Controllers\RootController;
use App\Http\Controllers\UserController;

use App\Models\Post;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);

//Route::get('/pages/{type?}/{title?}', [PageController::class,  'loadPage'])->name('pages.navigate');

Route::name('submit')->/*middleware('check.age')->*/group(function(){
    Route::get('submit/create/{age?}', function(){
        //create.blade.php form submission function here...
        echo "/submit/create";
    })->name('create');
});

/*Route::get('/user/blogs/{blogTitle?}')*/

Route::get('user/login', 'App\Http\Controllers\LoginController@show')->name('user.login');
Route::post('user/login/config', 'App\Http\Controllers\LoginController@login')->name('user.login_config');
 
/* RESOURCES */
//Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin', 'user' => 'member']]);
Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);


Route::get('user/create', 'App\Http\Controllers\RegisterController@show')->name('user.create');
Route::post('user/submit', 'App\Http\Controllers\RegisterController@register')->name('user.submit');


/* REDIRECTS */
//Route::get('signup', 'App\Http\Controllers\UserController@create');





require __DIR__.'/auth.php';
