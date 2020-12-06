<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpportunitiesTable extends Migration {

	public function up()
	{
		Schema::create('opportunities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->tinyInteger('status')->nullable();
			$table->bigInteger('client_id')->unsigned();
			$table->tinyInteger('stage')->default('1');
			$table->bigInteger('contact_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();


		});
	}

	public function down()
	{
		Schema::drop('opportunities');
	}
}
