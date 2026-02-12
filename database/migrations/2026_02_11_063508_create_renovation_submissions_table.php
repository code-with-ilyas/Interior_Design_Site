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
        Schema::create('renovation_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('intent');
            $table->string('category_slug');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->json('form_data_json');
            $table->string('status')->default('pending');
            $table->string('ip_address')->nullable();
            $table->timestamps();

            // Indexes for performance
            $table->index('intent');
            $table->index('category_slug');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renovation_submissions');
    }
};
