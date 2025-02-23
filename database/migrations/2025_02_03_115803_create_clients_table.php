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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id');
            $table->string('username')->unique();
            $table->json('groups')->nullable();
            $table->string('gender');
            $table->string('city')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->boolean('isBanned')->default(false);
            $table->date('register_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
