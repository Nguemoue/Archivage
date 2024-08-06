<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('temp_document_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temp_document_id');
            $table->foreignId('field_id');
				$table->text("content");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temp_document_fields');
    }
};
