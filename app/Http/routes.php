<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('me', 'MeController@account');
Route::post('me', 'MeController@editAccount');
Route::get('me/team', 'MeController@team');

Route::model('orders', 'Netshell\ShopSync\Models\Order');
Route::model('products', 'Netshell\ShopSync\Models\Product');
Route::model('categories', 'Netshell\ShopSync\Models\Category');
Route::model('shops', 'Netshell\ShopSync\Models\Shop');

Route::group(['prefix'=>'api/v1', 'namespace'=>'Api'], function(){
	Route::get('products/{products}/attach/{categories}', 'ProductController@attachCategory');
	Route::get('products/{products}/detach/{categories}', 'ProductController@detachCategory');
	Route::controllers([
		'categories' => 'CategoryController',
		'products' => 'ProductController'
	]);
});

Route::resources([
	'categories' => 'CategoryController',
	'orders' => 'OrderController',
	'products' => 'ProductController',
	'products.syncs' => 'SyncController',
	'me/shops' => 'ShopController',
	'me/payments' => 'PaymentController'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);