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
        Schema::table('products', function (Blueprint $table) {
             // Add the 'status_updated_at' column to store the timestamp of when the status was updated
             $table->timestamp('status_updated_at')->nullable(); // Nullable to allow for an initial empty state
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
           // Remove the 'status_updated_at' column when rolling back the migration
           $table->dropColumn('status_updated_at');
        });
    }
};
