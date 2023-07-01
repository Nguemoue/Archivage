<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
			  $table->timestamp("password_changed_at")->nullable();
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
			  $table->dropColumn("password_change_at");
        });
    }
};
