<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('sell_product', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('product_name', 255);
                $table->string('product_name_auxiliary', 255)->nullable();
                $table->boolean('display_type');
                $table->integer('cat_product_id');
                $table->string('copy', 255)->nullable();
                $table->string('overview', 255)->nullable();
                $table->string('set_content', 255)->nullable();
                $table->string('annotation', 255)->nullable();
                $table->string('image_first', 255)->nullable();
                $table->string('image_second', 255)->nullable();
                $table->boolean('display_rate');
                $table->double('sell_price', 15, 8)->nullable();
                $table->double('annotation_price', 15, 8)->nullable();
                $table->string('omotekumi_title', 255)->nullable();
                $table->text('omotekumi')->nullable();
                $table->string('url', 255);
                $table->string('file', 255);
                $table->boolean('display_top');
                $table->boolean('display')->nullable();
                $table->boolean('open_tab')->nullable();
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
		Schema::drop('sell_product');
	}

}
