<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('transaction_by');
            
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('transaction_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
