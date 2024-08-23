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
        Schema::create('prets', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_retour')->nullable();
            $table->string('status')->default('Non rendu');
            $table->unsignedBigInteger('ouvrage_id');
            $table->unsignedBigInteger('adherent_id');

            $table->foreign('ouvrage_id')->references('id')->on('ouvrages')->onDelete('cascade');
            $table->foreign('adherent_id')->references('id')->on('adherents')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prets');
    }
};
