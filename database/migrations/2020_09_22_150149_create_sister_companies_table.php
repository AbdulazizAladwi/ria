<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSisterCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('sister_companies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('phone1');
			$table->string('phone2');
			$table->string('email1');
			$table->string('email2');
			$table->bigInteger('client_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sister_companies');
	}
}
