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


//---User
Route::get('/','MainController@Main')->name('main');
//-------User subscribe paper
Route::get('SubscribeForm', 'SubscribeController@SubscribeForm')->name('SubscribePaperForm');
Route::post('SubmitInfoStore', 'SubscribeController@SubscribeStore')->name('SubmitInfoStore');
//-----------------------

Route::get('articleShow/{id}', 'MainController@articleShow')->name('articleShow');//--Show Page
Route::get('sadalaShow/{id}', 'MainController@sadalaShow')->name('sadalaShow');//---All Pages from Sadala
//------User Comments
Route::post('CommentStore/{id}/{ip}', 'CommentController@store')->name('CommentStore');
Route::post('CommentReplyStore/{post_id}/{comment_id}/{ip}', 'CommentController@ReplyStore')->name('CommentReplyStore');
Route::post('ReplyToComment/{post_id}/{comment_id}','CommentController@ReplyToComment')->name('ReplyToComment');

//-------Admin
Route::get('/admin', 'AdminPostController@index');

//-----Admin Posts
Route::get('page/create','AdminPostController@create')->name('articleCreate'); //--Post Create Page
Route::post('articleStore','AdminPostController@store')->name('articleStore');//---Post Save
Route::get('articleEdit/{id}', 'AdminPostController@edit')->name('articleEdit');//---Post Edit Page
Route::post('articleUpdate', 'AdminPostController@update')->name('articleUpdate');//---Save Edited Page
Route::get('articleDelete/{id}', 'AdminPostController@destroy')->name('articleDelete');//---Delete Page
Route::get('AdminArticleShow/{id}', 'AdminPostController@show')->name('AdminArticleShow');//--Admin show Page from Sadala
Route::get('AdminSadalaShow/{id}', 'AdminPostController@AdminSadalaShow')->name('AdminSadalaShow');//---All Admin Pages from Sadala

//---Admin Comments and replies to comments
Route::post('CommentStore', 'AdminCommentController@AdminCommentStore')->name('AdminCommentStore');
Route::get('DeleteComment/{commentid}/{postid}', 'AdminCommentController@destroy')->name('CommentDelete');
Route::get('AnswerDelete/{commentanswerid}/{answerpostid}', 'AdminCommentController@destroyAnswer')->name('AnswerDelete');
Route::post('AdminReplyStore/{post_id}/{comment_id}','AdminCommentController@AdminReplyComment')->name('AdminReplyComment');
Route::post('AdminCommentReplyStore/{id}/{ip}', 'AdminCommentController@AdminReplyStore')->name('AdminCommentReplyStore');
//----Admin Sadalas
Route::post('SadalaStore', 'AdminSadalaController@store')->name('SadalaStore');
Route::resource('admin/sadalas/new_sadala', 'AdminSadalaController');






//Route::auth();