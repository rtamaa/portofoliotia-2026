<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('category');

            $table->text('short_description')->nullable();

            $table->longText('background')->nullable();

            $table->longText('objective')->nullable();

            $table->longText('features')->nullable();

            $table->longText('tech_stack')->nullable();

            $table->longText('database_design')->nullable();

            $table->longText('flowchart_desc')->nullable();

            $table->longText('documentation')->nullable();

            $table->longText('conclusion')->nullable();

            $table->json('tags')->nullable();

            $table->string('thumbnail')->nullable();

            $table->string('erd')->nullable();

            $table->string('flowchart')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};