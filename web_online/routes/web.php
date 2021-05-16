<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::group(['prefix' => 'admin'], function () {
    Route::get('users', function ()    {
        // Matches The "/admin/users" URL
        return view('index',"CategoriesController");
    });
});

Route::get('/', function () {
    return view('categories/categories');
});
*/


Route::group(['prefix' => 'admin', "middleware"=> "login"], function () {
    
    Route::get('/register_shop',"RegisterController@register_shop");
    Route::post('/create_shop',"RegisterController@create_shop");
    
    Route::get('/dashboard',"DashboardController@index");
    
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/index', "CategoriesController@categories_all");
        Route::get('/add', "CategoriesController@categories_add");
        Route::post('/save', "CategoriesController@categories_save");
        Route::get('/edit/{id}', "CategoriesController@categories_edit");
        Route::post('/update/{id}', "CategoriesController@categories_update");
        Route::get('/delete/{id}', "CategoriesController@categories_detele");
        
    });
    
    Route::group(['prefix' => '/product'], function () {
        Route::get('/index', "ProductsController@product_all");
        Route::get('/add', "ProductsController@product_add");
        Route::post('/save', "ProductsController@product_save");
        Route::get('/edit/{id}', "ProductsController@product_edit");
        Route::post('/update/{id}', "ProductsController@product_update");
        Route::get('/delete/{id}', "ProductsController@product_delete");
        
    });
    
    Route::group(['prefix' => '/industries'], function () {
        Route::get('/index', "IndustryController@industries");
        Route::get('/add', "IndustryController@industries_add");
        Route::post('/save', "IndustryController@industries_save");
        Route::get('/edit/{id}', "IndustryController@industries_edit");
        Route::post('/update/{id}', "IndustryController@industries_update");
        Route::get('/delete/{id}', "IndustryController@industries_detele");
        
    });
    
    Route::group(['prefix' => '/payment'], function () {
        Route::get('/index', "PaymentController@payment");
        Route::get('/add', "PaymentController@payment_add");
        Route::post('/save', "PaymentController@payment_save");
        Route::get('/edit/{id}', "PaymentsController@payment_edit");
        Route::post('/update/{id}', "PaymentController@payment_update");
        Route::get('/delete/{id}', "PaymentController@payment_detele");
        
    });
    
    Route::group(['prefix' => '/payment'], function () {
        Route::get('/index', "PaymentController@payment");
        Route::get('/add', "PaymentController@payment_add");
        Route::post('/save', "PaymentController@payment_save");
        Route::get('/edit/{id}', "PaymentController@payment_edit");
        Route::post('/update/{id}', "PaymentController@payment_update");
        Route::get('/delete/{id}', "PaymentController@payment_detele");
        
    });
    
    Route::group(['prefix' => '/properties'], function () {
        Route::get('/index', "PropertiesController@index");
        Route::get('/add', "PropertiesController@properties_add");
        Route::post('/save', "PropertiesController@properties_save");
        Route::get('/edit/{id}', "PropertiesController@properties_edit");
        Route::post('/update/{id}', "PropertiesController@properties_update");
        Route::get('/delete/{id}', "PropertiesController@properties_detele");
        
    });
    
    Route::group(['prefix' => '/ship'], function () {
        Route::get('/index', "ShipmentController@shipment");
        Route::get('/add', "ShipmentController@shipment_add");
        Route::post('/save', "ShipmentController@shipment_save");
        Route::get('/edit/{id}', "ShipmentController@shipment_edit");
        Route::post('/update/{id}', "ShipmentController@shipment_update");
        Route::get('/delete/{id}', "ShipmentController@shipment_detele");
        
    });

    Route::group(['prefix' => '/status'], function () {
        Route::get('/index', "StatusController@status");
        Route::get('/add', "StatusController@status_add");
        Route::post('/save', "StatusController@status_save");
        Route::get('/edit/{id}', "StatusController@status_edit");
        Route::post('/update/{id}', "StatusController@status_update");
        Route::get('/delete/{id}', "StatusController@status_detele");
        
    });

    Route::group(['prefix' => '/voucher'], function () {
        Route::get('/index', "VoucherController@voucher");
        Route::get('/add', "VoucherController@voucher_add");
        Route::post('/save', "VoucherController@voucher_save");
        Route::get('/edit/{id}', "VoucherController@voucher_edit");
        Route::post('/update/{id}', "VoucherController@voucher_update");
        Route::get('/delete/{id}', "VoucherController@voucher_detele");
        
    });
    
    
    Route::group(['prefix' => '/goods'], function () {
        Route::get('/index', "GoodsController@index");
        Route::get('/view/{id}', "GoodsController@view");
        Route::get('/add', "GoodsController@add");
        Route::post('/save', "GoodsController@save");
        Route::get('/edit/{id}', "GoodsController@edit");
        Route::post('/update/{id}', "GoodsController@update");
        Route::get('/delete/{id}', "GoodsController@delete");
        
    });
    
    Route::group(['prefix' => '/orders'], function () {
        Route::get('/index', "OrdersController@orders");
        Route::get('/detail/{id}', "OrdersController@detail");
        Route::post('/update_status/{id}', "OrdersController@update_status");
        Route::get('/history',"OrdersController@history");
        
    });
    
    Route::group(['prefix' => '/chat'], function()
    {
        Route::get("/", "ChatController@index");
        Route::get('messages', 'ChatController@fetchMessages');
        Route::post('messages', 'ChatController@sendMessage');
    });
     
    Route::group(['prefix' => '/upload'], function()
    {
        Route::get("/", "UploadController@index");
        Route::post("/", "UploadController@update");
    });
});


Route::group(['prefix' => '/cart'], function () {  
    Route::get('/add',"CartController@add_cart");
    Route::get('/',"CartController@index");
    Route::post('/checkout',"CartController@check_out");
    Route::get('/checkvoucher',"CartController@check_voucher");
    Route::get('/complete',"CartController@complete");
    Route::get('/update',"CartController@update_soluong");
    Route::get('/update_voucher',"CartController@update_voucher");
    Route::get('/update_address',"CartController@update_address");
    Route::get('/delete',"CartController@delete");
    
    
});


Route::group(['prefix' => '/account'], function () {  
    Route::get('/orders',"AccountController@orders");
    Route::get('/orders/{id}',"AccountController@order_detail");
    Route::get('/return/{id}',"AccountController@return_orders");
    Route::post('/return/{id}',"AccountController@update_return_orders");
    Route::get('/cancel/{id}',"AccountController@cancel");
    Route::get('/index',"AccountController@index");
    Route::post('/update/{id}',"AccountController@update");
    Route::get('/address',"AccountController@address");
    Route::get('/add_address',"AccountController@add_address");
    Route::post('/add_address/save',"AccountController@save");
    Route::get('/comment/{id}',"AccountController@comment");
    Route::post('/comment/{id}',"AccountController@update_comment");
    
});

Route::get('/home',"HomeController@index");
Route::get('/',"HomeController@index");
Route::get('/search',"DetailController@search");


Route::get('/load_xa',"HomeController@load_xa");

Route::get('/login',"LoginController@index");
Route::post('/login/auth',"LoginController@auth");
Route::get('/logout',"LoginController@logout");

Route::get('/register',"RegisterController@index");
Route::post('/register/create',"RegisterController@create");

Route::get('/detail/{id}',"DetailController@index");
Route::get('/account/{id}',"AccountController@index");
Route::get('/cuahang/{id}',"AccountController@cuahang");
Route::get('/edit/{id}',"AccountController@edit_cuahang");
Route::post('/update/{id}',"AccountController@update_cuahang");







