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
        Schema::create('room_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('guest_id');
            $table->string('reservation_at')->nullable();
            $table->string('enter_at')->nullable();
            $table->string('exit_at')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_out')->default(0);
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('guest_id')->references('id')->on('guests')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_guests');
    }
};
