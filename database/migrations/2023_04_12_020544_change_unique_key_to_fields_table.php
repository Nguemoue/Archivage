<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropUnique("fields_name_unique");
        });
    }

    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->unique("unique");
        });
    }
};
