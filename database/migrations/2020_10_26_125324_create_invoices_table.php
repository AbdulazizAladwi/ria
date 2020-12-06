<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->nullable();
            $table->string('name');
            $table->date('date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('percentage');
            $table->integer('amount')->nullable();
            $table->bigInteger('payment_term_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('payment_term_id')->references('id')->on('payment_terms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
