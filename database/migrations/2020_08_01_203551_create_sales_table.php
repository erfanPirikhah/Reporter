<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('buyerName');
            $table->string('buyerCity');
            $table->integer('profit')->default(0);
            $table->integer('sellerCode');
            $table->integer('buyerCode');
            $table->string('phoneBuyer');
            $table->integer('price');

            $table->timestamps();
        });


        Schema::create('commodity_sale', function (Blueprint $table) {
            $table->integer('commodity_id')->unsigned();
            $table->integer('sale_id')->unsigned();
            $table->primary(['commodity_id','sale_id']);

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
        Schema::dropIfExists('commodity_sale');
    }
}
