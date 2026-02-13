<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('temp_documents', function (Blueprint $table) {
            $table->string('extension')->default('pdf');
        });
    }

    public function down(): void
    {
        Schema::table('temp_documents', function (Blueprint $table) {
            $table->string('extension')->default('pdf');
        });
    }
};
