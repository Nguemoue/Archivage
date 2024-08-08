<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('temp_document_fields', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('temp_document_id')->constrained()->cascadeOnDelete();
            $table->foreignId('field_id')->constrained()->cascadeOnDelete();
				$table->text("content");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temp_document_fields');
    }
};
