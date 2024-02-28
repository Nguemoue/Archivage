<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('property_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->cascadeOnDelete();
            $table->morphs("target");
            $table->string("value");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_values');
    }
};
