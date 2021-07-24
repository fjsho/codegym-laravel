<?php

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

use App\Book;
use Illuminate\Http\Request;

/**
* 本ダッシュボード表示
*/
Route::get('/', 'BooksController@dashboard');


/**
* 本を登録
*/
Route::post('/books', 'BooksController@store');

/**
* 本を削除 
*/
Route::delete('/book/{book}', function (Book $book) {
    $book->delete();
    return redirect('/');
});

/**
* 本を更新
*/
//更新画面
Route::post('/booksedit/{books}', function (Book $books) {
    return view('booksedit',['book'=>$books]);
});
//更新処理
Route::post('/books/update', 'BooksController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

