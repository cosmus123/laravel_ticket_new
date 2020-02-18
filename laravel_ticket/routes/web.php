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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'HomeController@index');

Route::get('/user', 'HomeController@user');

Route::get('/list', 'HomeController@listedit');

//Route::get('/list', 'HomeController@list');

Route::get('/ticket', 'HomeController@ticket');

Route::get('/ticket/view/{id}', 'TicketController@view');

Route::post('/comments', 'CommentsController@store');



Route::get('/ticket/edit/{id}', 'TicketController@edit');

Route::get('/edit', 'HomeController@edit');



Route::get('/edit', 'TicketController@edit');

// Route::post('/list', 'TicketController@status');


Route::any('/list/open/{id}', 'StatusController@open');

Route::any('/list/close/{id}', 'StatusController@close');


// Route::post('/user/form', 'TicketController@store');

//Route::get('/user/form', 'TicketController@ref');

Route::post('posts/{comments}/comments', 'CommentsController@store');

Route::resource('posts', 'TicketController');

Route::resource('comments', 'CommentsController');





Route::get('/search', 'TicketController@search');

Route::get('/searchticket', 'TicketController@search_ticket');

//Route::get('/searchlist', 'TicketController@search_list');
