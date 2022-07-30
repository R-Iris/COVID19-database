<?php

use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::post('/checklogin', 'App\Http\Controllers\LoginController@checklogin')
    ->name('login_controller');

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
