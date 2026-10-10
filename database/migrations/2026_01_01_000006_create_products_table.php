<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('name', 200);
            $table->string('slug', 220)->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('description')->nullable();
            $table->string('concentration', 40)->nullable(); // Extrait, EDP, EDT, EDC, etc.
            $table->string('gender', 20)->default('unisex')->index(); // men, women, unisex
            $table->string('fragrance_type', 30)->nullable()->index(); // spray, oil, solid, home, etc.
            $table->decimal('concentration_percent', 5, 2)->nullable();
            $table->decimal('longevity_hours', 5, 2)->nullable();
            $table->string('projection', 20)->nullable();
            $table->boolean('alcohol_free')->default(false)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
