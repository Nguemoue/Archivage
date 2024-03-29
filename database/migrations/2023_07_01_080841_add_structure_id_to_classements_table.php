<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('classements', function (Blueprint $table) {
            $table->foreignId("structure_id")->nullable()->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('classements', function (Blueprint $table) {
            $table->dropConstrainedForeignId("structure_id");
        });
    }
};
