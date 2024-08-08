<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', static function (Blueprint $table) {
			$table->id();
			$table->string("numero");
			$table->string("nom");
			$table->string("url");
			$table->foreignId("user_id")->nullable()->constrained();
			$table->unique(['numero','nom']);
			$table->timestamps();
			$table->foreignId("dossier_id")->constrained()->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('documents');
	}
}
