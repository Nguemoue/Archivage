<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('temp_documents', function (Blueprint $table) {
            $table->string("titre")->nullable();
            $table->json("data");
        });
    }

    public function down()
    {
        Schema::table('temp_documents', function (Blueprint $table) {
            $table->dropColumn("titre");
            $table->dropColumn("data");
        });
    }
};
