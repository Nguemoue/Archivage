<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sous_classements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("ordre")->default(1);
            $table->foreignId("classement_id")->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sous_classements');
    }
};