<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->string("nom");
            $table->text("description")->nullable(true);
        });

        Schema::table("documents",function (Blueprint $table){
            $table->json("data")->nullable();
            $table->foreignId("sous_type_document_id")->nullable(true)->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropColumn("nom");
            $table->dropColumn("description");

        });
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn("data");
            $table->dropConstrainedForeignId("sous_type_document_id");
        });

    }
};