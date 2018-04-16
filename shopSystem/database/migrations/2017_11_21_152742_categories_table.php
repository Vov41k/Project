<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
		        $table->increments('id');
		        $table->string('category_name');
		        $table->string('meta_tag_title');
		        $table->string('description');
		        $table->string('parent');
		        $table->string('image');
		        $table->integer('colum');
		        $table->string('meta_tag_keywords');
		        $table->integer('sort_order');
		        $table->string('status');
		        $table->string('filter');
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
        Schema::dropIfExists('categories');
    }
}
