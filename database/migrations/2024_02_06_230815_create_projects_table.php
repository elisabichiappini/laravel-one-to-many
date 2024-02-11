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
            //titoli colonna tabella portofolio di progetti
            $table->string('title', 50)->unique();
            $table->string('slug', 200);
            $table->string('tools', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->text('description')->nullable();
            $table->date('born')->nullable();
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