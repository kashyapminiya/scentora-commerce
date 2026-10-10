<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_notes', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fragrance_note_id')->constrained()->cascadeOnDelete();
            $table->string('note_stage', 10); // top, heart, base
            $table->unsignedInteger('sort_order')->default(0);
            $table->primary(['product_id', 'fragrance_note_id', 'note_stage']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_notes');
    }
};
