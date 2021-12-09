<?php
use App\Router;

// Router::get('/hello',function(){
//     echo 'Hello World!';
// });

// Router::error(function(){
//     echo '404! :: Page not found';
// });

Router::get('/','App\Controllers\HomeController@index');
Router::get('home','App\Controllers\HomeController@index');

Router::get('login','App\Controllers\Auth\LoginController@showLoginForm');
Router::post('login','App\Controllers\Auth\LoginController@login');

Router::get('/logout','\App\Controllers\Auth\LoginController@logout');
Router::post('/logout','\App\Controllers\Auth\LoginController@logout');

Router::get('register','App\Controllers\Auth\RegisterController@showRegisterForm');
Router::post('register','App\Controllers\Auth\RegisterController@register');

Router::get('/product','App\Controllers\Product\ProductController@showGrid');
Router::post('/delete-product','App\Controllers\Product\ProductController@delete');
Router::get('/product/detail','App\Controllers\Product\ProductController@showDetail');



Router::get('/profile','App\Controllers\ProfileController@showProfile');

Router::get('/edit-profile','App\Controllers\ProfileController@showEditProfile');
Router::post('/edit-profile','App\Controllers\ProfileController@editProfile');

Router::get('/admin','App\Controllers\AdminController@admin');
Router::get('/admin/categories','App\Controllers\AdminController@categories');
Router::post('/admin/categories','App\Controllers\AdminController@addCategory');
Router::post('/admin/categories/delete','App\Controllers\AdminController@deleteCategory');

Router::get('/admin/brands','App\Controllers\AdminController@brands');
Router::post('/admin/brands','App\Controllers\AdminController@addBrand');
Router::post('/admin/brands/delete','App\Controllers\AdminController@deleteBrand');

Router::get('/admin/products','App\Controllers\AdminController@products');
Router::get('/admin/products/add','App\Controllers\AdminController@showAddProduct');
Router::post('/admin/products/add','App\Controllers\AdminController@addProduct');

Router::post('/admin/products/edit','App\Controllers\AdminController@editProduct');

Router::post('/admin/products/delete','App\Controllers\AdminController@deleteProduct');


Router::error(function(){
    echo '404 :: Page Not Found';
});