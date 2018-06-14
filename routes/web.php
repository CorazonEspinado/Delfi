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

Route::get('/','MainController@Main')->name('main');

Route::get('sadalaShow/{id}', 'MainController@sadalaShow')->name('sadalaShow');
Route::post('CommentStore/{id}/{ip}', 'CommentController@store')->name('CommentStore');
Route::post('{post_id}/{comment_id}/{ip}', 'CommentController@ReplyStore')->name('CommentReplyStore');

Route::get('DeleteComment/{commentid}/{postid}', 'CommentController@destroy')->name('CommentDelete');



Route::get('articleShow/{id}', 'MainController@articleShow')->name('articleShow');
Route::post('{post_id}/{comment_id}','CommentController@ReplyToComment')->name('ReplyToComment');

Route::post('articleStore','AdminPostController@store')->name('articleStore');
Route::get('page/create','AdminPostController@create')->name('articleCreate');
Route::get('AdminArticleShow/{id}', 'AdminPostController@show')->name('AdminArticleShow');
Route::get('articleEdit/{id}', 'AdminPostController@edit')->name('articleEdit');
Route::get('articleDelete/{id}', 'AdminPostController@destroy')->name('articleDelete');
Route::post('articleUpdate', 'AdminPostController@update')->name('articleUpdate');
Route::resource('admin/sadalas/new_sadala', 'AdminSadalaController');

// Route::get('/admin/posts/edit/{{$post->id}}', 'AdminPostController@edit');

//Route::resource('/admin/posts', 'AdminPostController');

Route::get('/admin', 'AdminPostController@index');

//Route::auth();