<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration {

	public function up()
	{
		Schema::create('requirements', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->tinyInteger('type');
			$table->date('deadline');
			$table->bigInteger('opportunity_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('requirements');
	}
}
