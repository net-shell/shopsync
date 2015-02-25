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

		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id');
		});

		Schema::create('products', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->integer('listing_id');
		});

		Schema::create('products_ebay', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('product_id');
			$table->timestamps();
		});

		Schema::create('products_microweber', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('product_id');
			$table->timestamps();
		});

		Schema::create('prices', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->float('value');
			$table->string('currency', 4);
			$table->integer('product_id');
		});

		Schema::create('quantities', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->float('value');
			$table->string('unit')->nullable();
			$table->string('storage')->nullable();
			$table->integer('product_id');
		});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('category_id');
			$table->string('name');
			$table->string('driver')->nullable();
			$table->integer('parent_id');
		});

		Schema::create('category_product', function(Blueprint $table)
		{
			$table->integer('category_id');
			$table->integer('product_id');
		});

		Schema::create('orders', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->boolean('processed')->nullable();
			$table->integer('product_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
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
