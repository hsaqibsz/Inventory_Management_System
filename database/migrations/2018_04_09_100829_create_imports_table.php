<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('p_name');
            $table->string('p_image');
            $table->integer('p_quantity');
            $table->integer('price');
            $table->integer('profit')->default(5);
            $table->string('country')->default('afghanistan');
            $table->integer('neworuse')->default(1);
            $table->integer('quality')->default(1); //original or fake
            $table->boolean('guaranty')->default(1); // yes or no
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
        Schema::dropIfExists('imports');
    }
}
