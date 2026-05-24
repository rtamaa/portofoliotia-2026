<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->string('hero_title')->nullable();

            $table->string('hero_subtitle')->nullable();

            $table->longText('about')->nullable();

            $table->string('profile_image')->nullable();

            $table->string('email')->nullable();

            $table->string('location')->nullable();

            $table->string('footer_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};