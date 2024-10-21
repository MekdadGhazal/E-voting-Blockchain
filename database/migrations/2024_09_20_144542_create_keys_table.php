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
        Schema::create('keys', function (Blueprint $table) {
            $table->id();
            $table->string('bitcoin_public_key', 1024);
            $table->string('bitcoin_private_key', 1024);
            $table->string('bitcoin_address', 255);
            $table->string('is_used', 11)->default('0');
            $table->string('used_for', 11);
            $table->string('is_paid', 255)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keys');
    }
};
