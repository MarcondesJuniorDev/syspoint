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
        Schema::create('time_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('time_in')->nullable();
            $table->dateTime('time_out_break')->nullable();
            $table->dateTime('time_in_break')->nullable();
            $table->dateTime('time_out')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device')->nullable();
            $table->enum('status', ['entrada', 'saida'])->default('entrada');
            $table->decimal('extra_hours', 8, 2)->default(0);
            $table->decimal('missing_hours', 8, 2)->default(0);
            $table->decimal('bank_balance', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_records');
    }
};
