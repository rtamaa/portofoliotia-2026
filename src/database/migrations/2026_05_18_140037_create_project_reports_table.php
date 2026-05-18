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
        Schema::create('project_reports', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');

            $table->longText('problem_analysis');
            $table->longText('requirements');

            $table->longText('architecture');
            $table->longText('tech_stack');

            $table->longText('erd_diagram');
            $table->longText('flowchart_diagram');

            $table->longText('features');
            $table->longText('target_outputs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_reports');
    }
};