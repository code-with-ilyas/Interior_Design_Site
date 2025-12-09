<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name field
            $table->text('description'); // Description field
            $table->string('image')->nullable(); // Image field
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
