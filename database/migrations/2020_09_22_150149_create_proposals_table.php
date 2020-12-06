<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProposalsTable extends Migration {

	public function up()
	{
		Schema::create('proposals', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('client_id')->unsigned();
			$table->date('date');
			$table->longText('features');
			$table->integer('discount')->nullable();

			$table->text('technologies');
            $table->text('deliverables');

            $table->bigInteger('requirement_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('proposals');
	}
}
