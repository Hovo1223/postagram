<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_avatar', function (Blueprint $table) {
    $table->dropForeign('user_avatar_picture_id_foreign');
    $table->dropForeign('user_avatar_user_id_foreign');

    $table->unsignedBigInteger('picture_id')->nullable()->change();
    $table->unsignedBigInteger('user_id')->nullable()->change();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_avavatar', function (Blueprint $table) {
            //
        });
    }
};
