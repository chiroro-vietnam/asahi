<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('rental_product', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('product_name', 255);
                $table->string('product_name_auxiliary', 255)->nullable();
                $table->integer('cat_rental_id')->nullable();
                $table->string('copy', 255)->nullable();
                $table->string('overview', 255);
                $table->string('set_content', 255)->nullable();
                $table->string('annotation', 255)->nullable();
                $table->string('image_first', 255)->nullable();
                $table->string('image_second', 255)->nullable();
                $table->boolean('display')->nullable();
                $table->boolean('show_rate');
                $table->decimal('rental_first_price')->nullable();
                $table->decimal('rental_one_month_price')->nullable();
                $table->decimal('service_cost')->nullable();
                $table->text('omotekumi')->nullable();
                $table->boolean('display_top')->nullable();
                $table->integer('order')->nullable();
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
		Schema::drop('rental_product');
	}

}
