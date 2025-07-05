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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('doctor_id');
            $table->decimal('total_cost')->nullable();//saved later
            $table->foreignId('service_id');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreign('client_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('doctor_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->timestamp('date')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
