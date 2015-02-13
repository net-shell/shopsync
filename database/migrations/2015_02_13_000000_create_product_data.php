<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductData extends Migration {

	public function up()
	{
		Schema::create('product_data', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('product_id');
			$table->string('name');
			$table->float('price');
		});
	}

	public function down()
	{
		Schema::drop('product_data');
	}

}
