<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsyncInitial extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('user_id');
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
	}

	public function down()
	{
		Schema::drop('products');
		Schema::drop('products_ebay');
		Schema::drop('products_microweber');
	}

}
