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


Auth::routes();



    Route::group(['middleware'=>'web'],function (){
        Route::get('/', 'Auth\LoginController@index');
        Route::get('/home', 'HomeController@index');
        Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    });

//api
Route::group(['prefix'=>'api'],function (){

    Route::get('users/{user}',function (App\User $user){
       return $user;
    });
    Route::get('/gallery','API\HomeController@gallery');
    Route::get('/vip','API\HomeController@vip');
    Route::get('/enjoyed','API\HomeController@enjoyed');
    Route::get('/popular','API\HomeController@popular');
    Route::get('/new','API\HomeController@newproduct');
    Route::get('/category' ,'API\categoryController@category');
    Route::get('/subcategory/{id}' ,'API\categoryController@subcategory');
    Route::get('/comment/{id}' ,'API\ProductController@Comment');
    Route::get('/listpro/{id}/{limit}' ,'API\ProductController@ListPro');
    Route::get('/detailspro/{id}' ,'API\ProductController@DetailsPro');
    Route::get('/pages','API\PageController@Pages');
    Route::get('/getPage/{id}','API/API\PageController@getPage');
});
//Routing
Route::group(['middleware'=>'auth','prefix' => 'product'],function (){
        ///////////////////Product///////////////////////////
        Route::get('/','Product\ProductController@index');
        Route::get('/create','Product\ProductController@create');
        Route::get('/editor/{id}','Product\ProductController@editor');
        Route::post('/editor/upload','Product\ProductController@upload');
        Route::get('/edit/{id}','Product\ProductController@edit');
        Route::any('store','Product\ProductController@store');
        Route::any('update','Product\ProductController@update');
        Route::get('get_img/{id}','Product\ProductController@get_img');
        Route::post('del_img/','Product\ProductController@del_img');
        Route::post('del_img/','Product\ProductController@del_img');
        Route::get('/delete/{id}','Product\ProductController@delete');
        ///////////////////Category///////////////////////////
        Route::get('/category/','Product\CategoryController@index');
        Route::get('/category/create','Product\CategoryController@create');
        Route::post('/category/store','Product\CategoryController@store');
        Route::get('/category/edit/{id}','Product\CategoryController@edit');
        Route::post('/category/update','Product\CategoryController@update');
        Route::get('/category/delete/{id}','Product\CategoryController@destroy');
        ////////////////////////////Comment/////////////////////////////////////
        Route::get('/comment/','Product\CommentController@index');
        Route::get('/comment/edit/{id}','Product\CommentController@edit');
        Route::get('/comment/delete/{id}','Product\CommentController@destroy');
        Route::post('/comment/update','Product\CommentController@update');
        Route::get('/comment/delete/{id}','Product\CommentController@destroy');

});

Route::group(['middleware'=>'auth','prefix' => 'customer'],function () {
    Route::get('/', 'CustomerController@index');
    Route::get('/create', 'CustomerController@create');
    Route::post('store', 'CustomerController@store');
    Route::get('/edit/{id}', 'CustomerController@edit');
    Route::post('/update', 'CustomerController@update');
    Route::get('/delete/{id}', 'CustomerController@destroy');
});


Route::group(['middleware'=>'auth','prefix' => 'article'],function () {
    Route::get('/', 'ArticaleController@index');
    Route::get('/create', 'ArticaleController@create');
    Route::post('store', 'ArticaleController@store');
    Route::get('/edit/{id}', 'ArticaleController@edit');
    Route::post('/update', 'ArticaleController@update');
    Route::get('/delete/{id}', 'ArticaleController@destroy');
});

Route::group(['middleware'=>'auth','prefix' => 'question'],function () {
    Route::get('/', 'QuestionController@index');
    Route::get('/create', 'QuestionController@create');
    Route::post('store', 'QuestionController@store');
    Route::get('/edit/{id}', 'QuestionController@edit');
    Route::post('/update', 'QuestionController@update');
    Route::get('/delete/{id}', 'QuestionController@destroy');


});

Route::group(['middleware'=>'auth','prefix' => 'page'],function () {
    Route::get('/', 'PageController@index');
    Route::get('/create', 'PageController@create');
    Route::post('store', 'PageController@store');
    Route::get('/edit/{id}', 'PageController@edit');
    Route::post('/update', 'PageController@update');
    Route::get('/delete/{id}', 'PageController@destroy');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
