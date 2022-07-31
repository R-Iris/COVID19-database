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

/** Login Controller */
Route::post('/checklogin', 'App\Http\Controllers\LoginController@checklogin')
    ->name('login_controller');

Route::get('/logout', 'App\Http\Controllers\LoginController@logout')
    ->name('logout_controller');

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

Route::get('articles/{articleID}/edit', function ($articleID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_articles', [
        'article' => (new App\Models\Article)->findArticleByArticleID($articleID)
    ]);
})->whereNumber('articleID');

Route::get('articles/new_article', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_article');
});

/** Articles CRUD */
Route::post('/update_article', 'App\Http\Controllers\ArticlesController@update')
    ->name('article_update_controller');

Route::post('/add_article', 'App\Http\Controllers\ArticlesController@add')
    ->name('article_add_controller');

Route::get('/delete_article', 'App\Http\Controllers\ArticlesController@delete')
    ->name('delete_article_controller');

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

/** Users CRUD */
Route::post('/update_user', 'App\Http\Controllers\UsersController@update')
    ->name('user_update_controller');

Route::get('/delete_user', 'App\Http\Controllers\UsersController@delete')
    ->name('delete_user_controller');

Route::post('/add_user', 'App\Http\Controllers\UsersController@add')
    ->name('user_add_controller');

Route::get('/activate_user', 'App\Http\Controllers\UsersController@activate')
    ->name('user_activate_controller');

Route::get('/suspend_user', 'App\Http\Controllers\UsersController@suspend')
    ->name('user_suspend_controller');

/** Organization views */
Route::get('/organizations', function () {
    return view('organizations', [
        'organizations' => (new App\Models\Organization)->getAll()
    ]);
})->name('organizations');

Route::get('organizations/{orgID}/edit', function ($orgID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_organizations', [
        'organization' => (new App\Models\Organization)->findOrgByOrgID($orgID)
    ]);
})->whereNumber('orgID');

Route::get('organizations/new_organization', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_organization');
});

/** Organization CRUD */
Route::post('/update_organization', 'App\Http\Controllers\OrganizationsController@update')
    ->name('organization_update_controller');

Route::get('/delete_organization', 'App\Http\Controllers\OrganizationsController@delete')
    ->name('delete_organization_controller');

Route::post('/add_organization', 'App\Http\Controllers\OrganizationsController@add')
    ->name('organization_add_controller');

/** Countries and ProStaTer views */
Route::get('/countries_and_prostaters', function () {
    return view('countries_and_prostaters', [
        'countries' => (new App\Models\Country)->getAll(),
        'prostaters' => (new App\Models\ProStaTer)->getAll(),
    ]);
})->name('locations');

Route::get('countries/{countryID}/edit', function ($countryID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_countries', [
        'country' => (new App\Models\Country)->findCountryByCountryID($countryID)
    ]);
})->whereNumber('countryID');

Route::get('countries/new_country', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_country');
});

Route::get('proStaTers/{proStaTerID}/edit', function ($proStaTerID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_proStaTer', [
        'prostater' => (new App\Models\ProStaTer)->findProStaTerByProStaterID($proStaTerID)
    ]);
})->whereNumber('proStaTerID');

Route::get('proStaTers/new_proStaTer', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_proStaTer');
});

/** Countries CRUD */
Route::post('/update_country', 'App\Http\Controllers\CountriesController@update')
    ->name('country_update_controller');

Route::get('/delete_country', 'App\Http\Controllers\CountriesController@delete')
    ->name('delete_country_controller');

Route::post('/add_country', 'App\Http\Controllers\CountriesController@add')
    ->name('country_add_controller');

/** ProStaTer CRUD */
Route::post('/update_prostater', 'App\Http\Controllers\ProStaTersController@update')
    ->name('prostater_update_controller');

Route::get('/delete_prostater', 'App\Http\Controllers\ProStaTersController@delete')
    ->name('delete_prostater_controller');

Route::post('/add_prostater', 'App\Http\Controllers\ProStaTersController@add')
    ->name('prostater_add_controller');

/** Records views */
Route::get('records/{recordID}/edit', function ($recordID) {
    // Find an article by its article ID and pass it to a view called "post"
    return view('edit_record', [
        'record' => (new App\Models\Record)->findRecordByRecordID($recordID)
    ]);
})->whereNumber('recordID');

Route::get('records/new_record', function () {
    // Find an article by its article ID and pass it to a view called "post"
    return view('add_record');
});

/** Records CRUD */
Route::post('/update_record', 'App\Http\Controllers\RecordsController@update')
    ->name('record_update_controller');

Route::get('/delete_record', 'App\Http\Controllers\RecordsController@delete')
    ->name('delete_record_controller');

Route::post('/add_record', 'App\Http\Controllers\RecordsController@add')
    ->name('record_add_controller');
