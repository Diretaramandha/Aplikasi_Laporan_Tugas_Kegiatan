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
        Schema::create('detail_reports', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->dateTime('datetime');
            $table->text('link_file')->nullable();
            $table->text('file_upload')->nullable();
            $table->foreignId('id_report')->constrained('reports')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_reports');
    }
};
