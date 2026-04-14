<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('programs') || Schema::hasColumn('programs', 'image_path')) {
            return;
        }

        Schema::table('programs', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('icon');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('programs') || ! Schema::hasColumn('programs', 'image_path')) {
            return;
        }

        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
