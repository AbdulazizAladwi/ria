<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionsTable extends Migration {

	public function up()
	{
		Schema::create('actions', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('description')->nullable();
			$table->datetime('date_time')->nullable();
			$table->string('file')->nullable();
			$table->bigInteger('opportunity_id')->unsigned();
			$table->tinyInteger('stage_number')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('actions');
	}
}
