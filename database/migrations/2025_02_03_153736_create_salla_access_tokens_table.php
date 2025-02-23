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
        Schema::create('salla_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->timestamp('expire_date');
            $table->text('scope');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salla_access_tokens');
    }
};
