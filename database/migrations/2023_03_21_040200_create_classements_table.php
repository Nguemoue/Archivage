<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('classements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("ordre");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classements');
    }
};