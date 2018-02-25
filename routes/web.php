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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    // dashboard root goes here
    Route::get('/', 'DashboardPagesController@index');
    /**
     * Customer Group
     */
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', 'CustomerController@index');
        Route::post('/', 'CustomerController@postCustomer');
        // add new customer form
        Route::get('add', 'CustomerController@showNew');
        /** customer information edit and delete operations */
        Route::get('/edit/{id}', 'CustomerController@showEdit');
        Route::get('/delete/{id}', 'CustomerController@deleteCustomer');
        Route::post('/edit/{id}', 'CustomerController@postEdit');
        Route::get('/search', 'CustomerController@search');
    });
    /**
     * Employee Group
     */
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'EmployeeController@index');
        Route::post('/', 'EmployeeController@postUser');
        // add new customer form
        Route::get('add', 'EmployeeController@showNew');
    });
    /** floors */
    Route::group(['prefix' => 'floors'], function () {
        Route::get('/', 'FloorController@index');
        Route::get('/add', 'FloorController@showNew');
        Route::post('/add', 'FloorController@postNew');
        Route::get('/rooms/{id}', 'FloorController@showRooms');
        Route::get('/edit/{id}', 'FloorController@showEdit');
        Route::get('/delete/{id}', 'FloorController@deleteFloor');
        Route::post('/edit/{id}', 'FloorController@postEdit');
        Route::get('/search', 'FloorController@search');
    });
    /**
     * Room Controller
     */
    Route::group(['prefix' => 'rooms'], function () {
        Route::get('/', 'RoomController@index');
        Route::get('/add', 'RoomController@showNew');
        Route::post('/add', 'RoomController@postRoom');
        Route::get('/edit/{id}', 'RoomController@showEdit');
        Route::post('/edit/{id}', 'RoomController@postEdit');
        Route::get('/delete/{id}', 'RoomController@deleteRoom');
        Route::get('/search', 'RoomController@search');

    });
    /**
     * This route group will be used to show, edit update delete blocks information
     */
    Route::group(['prefix' => 'blocks'], function () {
        Route::get('/', 'BlocksController@index');
        Route::get('/add', 'BlocksController@showNew');
        Route::post('/add', 'BlocksController@postNew');
        Route::get('/edit/{id}', 'BlocksController@showEdit');
        Route::post('/edit/{id}', 'BlocksController@postEdit');
        Route::get('/delete/{id}', 'BlocksController@deleteBlock');
    });

    Route::group(['prefix' => 'roomtype'], function () {
        Route::get('/', 'RoomsTypeController@index');
        Route::get('/add', 'RoomsTypeController@showNew');
        Route::post('/add', 'RoomsTypeController@postNew');
        Route::get('/edit/{id}', 'RoomsTypeController@showEdit');
        Route::post('/edit/{id}', 'RoomsTypeController@postEdit');
        Route::get('/delete/{id}', 'RoomsTypeController@deleteRoomType');
    });
    /**
     * Route group for booking
     */
    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', 'BookingController@index');
        Route::get('/book', 'BookingController@showNew');
        Route::post('/book', 'BookingController@postNew');
        Route::get('/checkout/{id}', 'BookingController@showCheckout');
        Route::post('/checkout/{id}', 'BookingController@postCheckout');
    });
    /**
     * Tasks Route group
     */
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', 'TasksController@index');
        Route::get('/add', 'TasksController@showNew');
        Route::post('/add', 'TasksController@postTask');
        Route::get('/done/{id}', 'GeneralAdmin@done');
    });
    /**
     * Routes for employees
     */
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'AdminController@index');
        Route::get('/ex', 'AdminController@exEmp');
        Route::get('/add', 'AdminController@showForm');
        Route::post('/add', 'AdminController@postNew');
        Route::get('/edit/{id}', 'AdminController@showEdit');
        Route::post('/edit/{id}', 'AdminController@postEdit');
        Route::get('/delete/{id}', 'AdminController@deleteEmployee');
        Route::get('search', 'AdminController@search');
        Route::get('search/ex', 'AdminController@searchEx');
        Route::group(['prefix' => 'roles'], function () {
            Route::get('add', 'AdminController@showRoleForm');
            Route::post('add', 'AdminController@postRole');
        });
    });
    Route::get('/emp/activity/delete/{id}', 'EmployeeActivityController@delete');

});
