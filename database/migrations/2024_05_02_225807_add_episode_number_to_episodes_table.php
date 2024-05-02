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
        if (!Schema::hasColumn('episodes', 'episode_number')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->integer('episode_number')->after('description');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('episodes', 'episode_number')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->dropColumn('episode_number');
            });
        }
    }
};
