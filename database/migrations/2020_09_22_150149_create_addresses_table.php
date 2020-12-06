<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('area')->nullable();
			$table->string('block')->nullable();
			$table->string('street')->nullable();
			$table->string('zip_code')->nullable();
			$table->bigInteger('client_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('addresses');
	}
}
