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
        Schema::table('projects', function(Blueprint $table) {
            //creo colonna e mi lego da project a types
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            //la definisco foreign key, quindi dentro il campo di type_id mi riferisco all'id di types 
            $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function(Blueprint $table) {
            //cancelliamo la foreign key
            $table->dropForeign('projects_type_id_foreign');
            //cancelliamo anche la colonna
            $table->dropColumn('type_id');
        });
    }
};
