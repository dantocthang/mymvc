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

Router::get('/profile','App\Controllers\ProfileController@showProfile');

Router::get('/edit-profile','App\Controllers\ProfileController@showEditProfile');
Router::post('/edit-profile','App\Controllers\ProfileController@editProfile');

Router::error(function(){
    echo '404 :: Page Not Found';
});