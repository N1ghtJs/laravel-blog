<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Auth
Auth::routes();

//首页
Route::get('/', 'HomeController@index')->name('home');

//文章列表页
Route::get('/article/list', 'ArticleController@list')->name('article.list');
//文章搜索页
Route::get('/article/search', 'ArticleController@search')->name('article.search');
//文章资源路由
Route::get('article/{article}', 'ArticleController@show')->name('article.show');
//markdown AJAX 解析
Route::post('/markdown', 'ArticleController@markdown')->name('markdown');
//markdown AJAX 获取文章内容
Route::get('/markdown/{article}', 'ArticleController@markdown_article')->name('markdown.article');


//评论资源路由
Route::post('/comments', 'CommentsController@store')->middleware('throttle:5')->name('comments.store');
//回复（评论）资源路由
Route::post('/replys', 'ReplysController@store')->middleware('throttle:5')->name('replys.store');
//回复（留言）资源路由
Route::post('/remessags', 'RemessagesController@store')->middleware('throttle:5')->name('remessages.store');
//留言资源路由
Route::get('messages', 'MessagesController@index')->name('messages.index');
Route::post('messages', 'MessagesController@store')->middleware('throttle:5')->name('messages.store');

//todo 资源路由
Route::get('/todos', 'TodosController@index')->name('todos.index');
//Route::get('/todos/create', 'TodosController@create')->name('todos.create');
Route::post('/todos', 'TodosController@store')->name('todos.store');
//Route::get('/todos/{todo}', 'TodosController@show')->name('todos.show');
//Route::get('/todos/{todo}/edit', 'TodosController@edit')->name('todos.edit');
//Route::patch('/todos/{todo}', 'TodosController@update')->name('todos.update');
Route::delete('/todos/{todo}', 'TodosController@destroy')->name('todos.destroy');

//管理后台
Route::group(['middleware' => ['auth'],'namespace' => 'Admin','prefix' => 'admin'],function(){
    //首页
    Route::get('/','AdminController@index')->name('admin');

    //文章隐藏
    Route::get('/article/hidden/{id}', 'ArticleController@hidden')->name('article.hidden');

    //文章资源路由
    Route::resource('article','ArticleController', ['except' => 'show']);
});
