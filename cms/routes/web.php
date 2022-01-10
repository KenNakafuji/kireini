<?php

use App\Book;
use Illuminate\Http\Request;

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

// 本のダッシュボード表示
Route::get('/', 'BooksController@index');

// 登録処理（新「本」を追加）
Route::post('/books','BooksController@store');

// 更新画面(「本」の更新画面表示)
Route::get('/booksedit/{book}','BooksController@edit');

// 更新処理(「本」の更新処理)
Route::post('/books/update','BooksController@update');

// 削除処理（本を削除）
Route::delete('/book/{book}','BooksController@destroy');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');