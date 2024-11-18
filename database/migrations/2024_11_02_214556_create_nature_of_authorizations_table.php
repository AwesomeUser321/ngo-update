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
        Schema::create('nature_of_authorizations', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing unsigned bigint)
            $table->string('name'); // Name field
            $table->timestamps(); // Automatically adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nature_of_authorizations');
    }
};
