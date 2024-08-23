<?php

use App\Enums\TypeOuvrage;
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
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(TypeOuvrage::LIVRE);
            $table->string('titre');
            $table->string('thematique');
            $table->integer('nb_page');
            $table->year('date_parution')->nullable();
            $table->string('auteur')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvrages');
    }
};
