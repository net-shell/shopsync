<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSyncInitial extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('user_id');
			$table->timestamps();
		});

		Schema::create('products_ebay', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('products_microweber', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('syncables', function(Blueprint $table)
		{
			$table->bigInteger('product_id');
			$table->bigInteger('syncable_id');
			$table->string('syncable_type');
		});
	}

	public function down()
	{
		Schema::drop('products');
		Schema::drop('products_ebay');
		Schema::drop('syncables');
	}

}
