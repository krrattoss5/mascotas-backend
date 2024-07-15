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
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->text('description')->nullable();
            $table->date('date_adoption')->nullable();
            $table->date('date_return')->nullable();
            $table->date('date_delivered')->nullable();
            $table->date('date_received')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
