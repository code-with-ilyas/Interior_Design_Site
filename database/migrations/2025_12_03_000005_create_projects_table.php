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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('cover_image')->nullable();

            // Renovation / Interior Fields
            $table->string('property_type')->nullable();
            $table->string('project_type')->nullable();
            $table->string('surface_area')->nullable();
            $table->string('condition_before')->nullable();
            $table->decimal('budget', 12, 2)->nullable();
            $table->string('cost_currency')->nullable();
            $table->integer('duration_weeks')->nullable();
            $table->year('completion_year')->nullable();

            // Environmental
            $table->string('co2_avoided_per_year')->nullable();

            // Additional
            $table->string('location')->nullable();
            $table->string('client_name')->nullable();
            $table->string('architect_name')->nullable();
            $table->string('contractor_name')->nullable();
            $table->longText('materials_used')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('result_highlights')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
