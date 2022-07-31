<?php

use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function() {
    return view('login');
})->name('login');

/** Controllers */
Route::post('/checklogin', 'App\Http\Controllers\LoginController@checklogin')
    ->name('login_controller');

/** Articles views */
Route::get('/articles', function () {
    return view('articles', [
        'articles' => (new App\Models\Article)->getAll()
    ]);
})->name('articles');

Route::get('articles/{article}', function ($articleID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('article', [
        'article' => (new App\Models\Article)->findArticleByArticleID($articleID)
    ]);
})->whereNumber('article');

/** Users views */
Route::get('/users', function () {
    return view('users', [
        'users' => (new App\Models\User)->getAll()
    ]);
})->name('users');

Route::get('users/{userID}/edit', function ($userID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_users', [
        'user' => (new App\Models\User)->findUserbyUserID($userID)
    ]);
})->whereNumber('userID');

Route::get('users/new_user', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_user');
});

Route::post('/update', 'App\Http\Controllers\UsersController@update')
    ->name('user_update_controller');

Route::get('/delete', 'App\Http\Controllers\UsersController@delete')
    ->name('delete_user_controller');

Route::post('/add', 'App\Http\Controllers\UsersController@add')
    ->name('user_add_controller');
