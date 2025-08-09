<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Add only if columns don’t already exist
            if (!Schema::hasColumn('courses', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('courses', 'description')) {
                $table->text('description')->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('courses', 'name')) {
                $table->dropColumn('name');
            }
        });
    }
};
