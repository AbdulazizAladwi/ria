<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('phone1')->nullable();
			$table->string('phone2')->nullable();
			$table->string('email1');
			$table->string('email2')->nullable();
			$table->enum('gender', array('male', 'female'))->nullable();
			$table->string('job_title')->nullable();
			$table->string('client_relation')->nullable();
			$table->string('instagram')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('snapchat')->nullable();
			$table->bigInteger('client_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
