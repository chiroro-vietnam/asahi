<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRentalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('category_rental', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name', 255);
                $table->boolean('display');
                $table->boolean('is_deleted')->default(0);
                $table->integer('order');
                $table->timestamps();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_rental');
	}

}
