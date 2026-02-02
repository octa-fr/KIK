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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mitra_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->enum('jurusan', ['rpl', 'aph', 'upw', 'tb']);
            $table->string('lokasi')->nullable(); // <--- kolom lokasi
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
