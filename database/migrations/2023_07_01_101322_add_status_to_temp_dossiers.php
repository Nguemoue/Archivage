<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('temp_dossiers', function (Blueprint $table) {
            $table->integer("status")->default(0);
        });
    }

    public function down()
    {
        Schema::table('temp_dossiers', function (Blueprint $table) {
            $table->dropColumn("status");
        });
    }
};
