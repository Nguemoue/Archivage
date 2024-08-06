<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempDocumentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_documents', function (Blueprint $table) {
			$table->id();
			$table->string("numero")->unique();
			$table->string("url");
			$table->string("titre")->nullable();
			$table->json("data");
			$table->foreignId("structure_id")->nullable()->constrained("structures")->cascadeOnDelete();
			$table->integer("status")->default(0);
			$table->foreignId("user_id")->nullable()->constrained()->cascadeOnDelete();
			$table->foreignId("temp_dossier_id")->constrained()->cascadeOnDelete();
			$table->foreignId("sous_type_document_id")->nullable()->constrained()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('temp_documents');
	}
}
