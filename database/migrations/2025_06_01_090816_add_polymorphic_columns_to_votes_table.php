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
         Schema::table('votes', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->unsignedBigInteger('votable_id');
        $table->string('votable_type');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('votes', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->dropColumn(['votable_id', 'votable_type']);
    });
    }
};
