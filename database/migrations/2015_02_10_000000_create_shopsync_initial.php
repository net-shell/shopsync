<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsyncInitial extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('mw_id');
			$table->string('name');
			$table->string('email');
			$table->string('token');
			$table->string('avatar')->nullable();
			$table->string('data_raw');
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('shops', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('driver');
			$table->string('default_config', 200)->default('{}');
		});

		Schema::create('shop_configs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('shop_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->string('config', 200)->default('{}');
			$table->timestamps();
		});

		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned();
		});

		Schema::create('products', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->integer('listing_id');
			$table->integer('updated_by')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('products_ebay', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->bigInteger('product_id')->unsigned();
			$table->timestamps();
		});

		Schema::create('products_microweber', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->bigInteger('product_id')->unsigned();
			$table->timestamps();
		});

		Schema::create('prices', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->float('value');
			$table->string('currency', 4);
			$table->bigInteger('product_id')->unsigned();
		});

		Schema::create('quantities', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->float('value');
			$table->string('unit')->nullable();
			$table->string('storage')->nullable();
			$table->bigInteger('product_id')->unsigned();
		});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('category_id');
			$table->string('name');
			$table->string('driver')->nullable();
			$table->bigInteger('parent_id')->unsigned();
		});

		Schema::create('category_product', function(Blueprint $table)
		{
			$table->bigInteger('category_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();
		});

		Schema::create('orders', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->boolean('processed')->nullable();
			$table->bigInteger('product_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
		Schema::drop('shops');
		Schema::drop('shop_configs');
		Schema::drop('listings');
		Schema::drop('products');
		Schema::drop('products_ebay');
		Schema::drop('products_microweber');
		Schema::drop('prices');
		Schema::drop('quantities');
		Schema::drop('categories');
		Schema::drop('category_product');
		Schema::drop('orders');
	}

}
