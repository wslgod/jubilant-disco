<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('topic_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->enum('type', ['pdf', 'resumo']);
            $table->longText('summary_content')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->foreignId('uploaded_by')->constrained('users');
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
