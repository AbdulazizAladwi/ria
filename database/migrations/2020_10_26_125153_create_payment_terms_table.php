<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('percentage')->nullable();
            $table->double('amount')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');
            $table->bigInteger('opportunity_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymment_terms');
    }
}
