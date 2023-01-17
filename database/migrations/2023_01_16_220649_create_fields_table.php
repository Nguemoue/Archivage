<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("type")->nullable();
            $table->string("placeholder")->nullable();
            $table->string("label")->nullable();
            $table->string("class")->nullable();
            $table->string("min")->nullable();
            $table->string("max")->nullable();
            $table->boolean("required")->default(false);
            $table->string("value")->nullable();
            $table->foreignId("sous_type_document_id")->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('fields');
    }
}
