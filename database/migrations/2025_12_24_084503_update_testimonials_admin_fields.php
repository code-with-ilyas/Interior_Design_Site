<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {

            // Add admin required fields
            
            $table->string('client_name')->change();
            $table->string('designation')->nullable()->change();
            $table->text('video_link')->nullable();
            $table->text('review');
            $table->integer('rating')->nullable();
            $table->string('image')->nullable();
           

            // Remove old fields if any
            $table->dropColumn([
                'testimonial_text',
                'client_image',
                'sort_order',
                'is_active',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {

            // Rollback added fields
            $table->dropColumn([
                'video_link',
                'review',
                'rating',
                'image',
            ]);

            // Restore old fields
            $table->text('testimonial_text');
            $table->string('client_image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
        });
    }
};
