<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->morphs("profile");
            $table->string("device");
            $table->string("ip_address");
            $table->string("guard")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('connections');
    }
};