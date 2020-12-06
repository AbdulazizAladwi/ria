<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTypesTable extends Migration {

	public function up()
	{
		Schema::create('client_types', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('client_types');
	}
}
