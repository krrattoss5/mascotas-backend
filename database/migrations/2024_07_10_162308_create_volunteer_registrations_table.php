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
        Schema::create('volunteer_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volunteering_id');
            $table->unsignedBigInteger('volunteer_user_id');
            $table->string('role');
            $table->string('status');
            $table->text('observations')->nullable();
            $table->integer('hours_committed')->default(0);
            $table->integer('hours_completed')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('volunteering_id')->references('id')->on('volunteerings')->onDelete('cascade');
            $table->foreign('volunteer_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_registrations');
    }
};
