<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSowResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sow_resource', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sow_id');
            $table->unsignedBigInteger('resource_id');
            $table->tinyInteger('estimation_type');
            $table->integer('estimation');
            $table->timestamps();

            $table->foreign('sow_id')
                ->references('id')
                ->on('scope_of_works')
                ->onDelete('cascade');

            $table->foreign('resource_id')
                ->references('id')
                ->on('resources')
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
        Schema::dropIfExists('sow_resource');
    }
}
