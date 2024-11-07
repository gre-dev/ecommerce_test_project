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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Unique identifier for the review

            // Create relationship with users table
            // When a user is deleted, all their reviews will be deleted (cascade)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Create relationship with products table
            // When a product is deleted, all its reviews will be deleted (cascade)
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->integer('rating'); // Product rating (1-5)
            $table->text('comment'); // Review text content
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
