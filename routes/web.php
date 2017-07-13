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
/*
***Guest
*/
Route::group(['middleware'=>['guest']],function(){
Route::get('/','BetController@showBet');
Route::get('/closedbet','BetController@closeBet');
Route::get('/completed','BetController@completedMatch');
Route::get('/{id}/show','BetController@showDetailMatch')->name('show_detail_match');
});

Route::group(['prefix'=>'user','middleware'=>['user']],function(){
    Route::get('/','UserController@showBet')->name('user_bet');
    Route::get('/closedbet','UserController@closeBet');
    Route::get('/completed','UserController@completedMatch');
    Route::get('/history','UserController@history');
    Route::get('/user/{id}/show','UserController@show');
    Route::get('/{id}/bet','UserController@betMatchForm')->name('bet_a_match');
    Route::post('/{id}/bet','UserController@betMatch')->name('bet_a_match1');
});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    /*
    *Match 
    */
    //Hidden Match
    Route::get('/matches','MatchController@show')->name('view_hidden_matches');
    Route::get('/matches/{id}/delete','MatchController@delete');
    Route::post('/matches/{id}/delete','MatchController@deleteMatch')->name('delete_hidden_match');
    Route::get('/matches/{id}/edit','MatchController@editForm')->name('edit_hidden_match');
    Route::post('/matches/{id}/edit','MatchController@editMatch')->name('update_hidden_match');
    Route::get('/matches/{id}/public','MatchController@publicMatch');
    Route::get('/matches/create','MatchController@createForm')->name('create_hidden_match');
    Route::post('/matches/create','MatchController@createMatch');  
    //Public Match
    Route::get('/matches/public','MatchController@showPublicMatch')->name('view_public_matches');
    Route::get('/matches/public/{id}/detail','MatchController@detailPublicMatch');
    Route::get('/matches/public/{id}/delete','MatchController@deletePublicMatchForm');
    Route::post('/matches/public/{id}/delete','MatchController@deletePublicMatch')->name('delete_public_match');
    Route::get('/matches/public/{id}/updatescore','MatchController@updateScoreForm');
    Route::post('/matches/public/{id}/updatescore','MatchController@updateScore')->name('update_score');
});