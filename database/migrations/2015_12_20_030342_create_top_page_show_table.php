<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopPageShowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('top_page_show', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('rental_product_id')->nullable();
                $table->integer('sell_product_id')->nullable();
                $table->boolean('is_deleted')->default(0);
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
		Schema::drop('top_page_show');
	}

}
