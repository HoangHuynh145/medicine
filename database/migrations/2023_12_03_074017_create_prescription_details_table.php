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
        Schema::create('prescription_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescriptionId')->references('id')->on('prescriptions');
            $table->unsignedBigInteger('medicationId')->references('id')->on('medications');
            $table->integer('singleDose');
            $table->integer('frequency');
            $table->integer('quantity');
            $table->boolean('deleteFlag')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_details');
    }
};
