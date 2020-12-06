<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('client_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sister_companies', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('opportunities', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('opportunities', function(Blueprint $table) {
			$table->foreign('contact_id')->references('id')->on('contacts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->foreign('opportunity_id')->references('id')->on('opportunities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('requirements', function(Blueprint $table) {
			$table->foreign('opportunity_id')->references('id')->on('opportunities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('proposals', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('proposals', function(Blueprint $table) {
			$table->foreign('requirement_id')->references('id')->on('requirements')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('designes', function(Blueprint $table) {
			$table->foreign('requirement_id')->references('id')->on('requirements')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('wireframes', function(Blueprint $table) {
			$table->foreign('requirement_id')->references('id')->on('requirements')
						->onDelete('cascade')
						->onUpdate('cascade');
		});


	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_type_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
		Schema::table('addresses', function(Blueprint $table) {
			$table->dropForeign('addresses_client_id_foreign');
		});
		Schema::table('sister_companies', function(Blueprint $table) {
			$table->dropForeign('sister_companies_client_id_foreign');
		});
		Schema::table('opportunities', function(Blueprint $table) {
			$table->dropForeign('opportunities_client_id_foreign');
		});
		Schema::table('opportunities', function(Blueprint $table) {
			$table->dropForeign('opportunities_contact_id_foreign');
		});
		Schema::table('actions', function(Blueprint $table) {
			$table->dropForeign('actions_opportunity_id_foreign');
		});
		Schema::table('requirements', function(Blueprint $table) {
			$table->dropForeign('requirements_opportunity_id_foreign');
		});
		Schema::table('proposals', function(Blueprint $table) {
			$table->dropForeign('proposals_client_id_foreign');
		});
		Schema::table('proposals', function(Blueprint $table) {
			$table->dropForeign('proposals_requirement_id_foreign');
		});
		Schema::table('designes', function(Blueprint $table) {
			$table->dropForeign('designes_requirement_id_foreign');
		});
		Schema::table('wireframes', function(Blueprint $table) {
			$table->dropForeign('wireframes_requirement_id_foreign');
		});


	}
}
