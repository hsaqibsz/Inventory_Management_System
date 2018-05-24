<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->integer('imports_id');
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->string('bill_number')->default(uniqid());
            $table->integer('price');
            $table->integer('priceDefault');
            $table->integer('profit');
            $table->integer('discount')->default(0);
            $table->integer('total');
            $table->integer('net_total');
            $table->integer('paid');
            $table->integer('balance');
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
        Schema::dropIfExists('sales');
    }
}
