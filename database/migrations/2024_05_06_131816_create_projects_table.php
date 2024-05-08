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
            $table->string('name');
            $table->string('start_date');
            $table->string('deadline');
            $table->text('summary');
            $table->enum('status',['not_started','running','canceled','completed']);
            $table->string('completion_status');
            $table->foreignId('member')->constrained('employers');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('category_id')->constrained('project_categories');
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
