<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('details');
            $table->text('save_conditions');
            $table->text('danger');
            $table->text('danger_type');
            $table->string('buy_place');
            $table->timestamp('found_date');
            $table->timestamp('date_born');
            $table->unsignedInteger('date_death')->nullable();
            $table->string('date_death_name')->nullable();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('products');
    }
}
