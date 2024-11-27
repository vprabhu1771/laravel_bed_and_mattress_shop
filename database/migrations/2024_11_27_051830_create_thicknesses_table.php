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
        Schema::create('thicknesses', function (Blueprint $table) {
            $table->id();

            $table->decimal('value_in_inches', 5, 2); // e.g., 4, 6, 8, 10
            
            $table->decimal('value_in_feet', 5, 2);   // e.g., 0.33, 0.5, 0.67, 0.83
            
            $table->decimal('value_in_cm', 5, 2);     // e.g., 10.16, 15.24, 20.32, 25.4
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thicknesses');
    }
};
