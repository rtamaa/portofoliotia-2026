<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1. tambah column kalau belum ada
        if (!Schema::hasColumn('projects', 'slug')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('title');
            });
        }

        // 2. isi slug langsung via query builder (lebih aman dari Model)
        $projects = DB::table('projects')->get();

        foreach ($projects as $project) {
            $slug = Str::slug($project->title . '-' . $project->id);

            DB::table('projects')
                ->where('id', $project->id)
                ->update(['slug' => $slug]);
        }

        // 3. pastikan NOT NULL + unique
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};