<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWireframesTable extends Migration {

	public function up()
	{
		Schema::create('wireframes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('description');
			$table->string('file');
			$table->bigInteger('requirement_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('wireframes');
	}
}
