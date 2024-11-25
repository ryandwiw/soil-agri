<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// Tambahkan kolom ip pada migrasi
public function up()
{
    Schema::create('article_views', function (Blueprint $table) {
        $table->id();
        $table->foreignId('article_id')->constrained();
        $table->string('ip');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_views');
    }
};
