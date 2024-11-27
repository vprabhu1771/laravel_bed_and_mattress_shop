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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            // FK to products
            $table->unsignedBigInteger('product_id');
            
            // FK to sizes
            $table->unsignedBigInteger('size_id')->nullable();
            
            // FK to thicknesses
            $table->unsignedBigInteger('thickness_id')->nullable();

            // Dimensions in inches (e.g., 72x30)
            $table->string('dimension_in_inches')->nullable();
            
            // Dimensions in feet
            $table->string('dimension_in_feet')->nullable();
            
            // Dimensions in cm
            $table->string('dimension_in_cm')->nullable();

            // Variant code (e.g., 7237)
            $table->string('product_variant_code')->nullable();

            // price
            $table->decimal('price', 8, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
