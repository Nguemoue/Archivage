<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
    	  //pour les dossiers
        Schema::table('dossiers', function (Blueprint $table) {
        	$table->foreignId("structure_id")->nullable()->constrained("structures")->cascadeOnDelete();
        });
        //dans la table documents
		 Schema::table('documents', function (Blueprint $table) {
			 $table->foreignId("structure_id")->nullable()->constrained("structures")->cascadeOnDelete();

		 });

		 //dans la table temp dossier
		 Schema::table('temp_dossiers', function (Blueprint $table) {
			 $table->foreignId("structure_id")->nullable()->constrained("structures")->cascadeOnDelete();

		 });
		 //dans la table temp documents
		 Schema::table('temp_documents', function (Blueprint $table) {
			 $table->foreignId("structure_id")->nullable()->constrained("structures")->cascadeOnDelete();

		 });

    }

    public function down()
    {
		 //pour les dossiers
		 Schema::table('dossiers', function (Blueprint $table) {
			 $table->dropConstrainedForeignId("structure_id");
		 });
		 //dans la table documents
		 Schema::table('documents', function (Blueprint $table) {
			 $table->dropConstrainedForeignId("structure_id");
		 });

		 //dans la table temp dossier
		 Schema::table('temp_dossiers', function (Blueprint $table) {
			 $table->dropConstrainedForeignId("structure_id");
		 });
		 //dans la table temp documents
		 Schema::table('temp_documents', function (Blueprint $table) {
			 $table->dropConstrainedForeignId("structure_id");
		 });
    }
};
