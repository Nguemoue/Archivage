<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('super_admins', function (Blueprint $table) {
            $table->id();
			  $table->string('name');
			  $table->string('email')->unique();
			  $table->timestamp('email_verified_at')->nullable();
			  $table->string('password');
			  $table->string("organisation",20)->nullable();
			  $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('super_admins');
    }
};
