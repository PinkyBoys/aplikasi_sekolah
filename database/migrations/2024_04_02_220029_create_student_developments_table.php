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
        Schema::create('student_developments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->boolean('is_new')->nullable();
            $table->string('previous_grade')->nullable();
            $table->string('school_name')->nullable();
            $table->string('date')->nullable();
            $table->boolean('transfer')->nullable();
            $table->string('transfer_school')->nullable();
            $table->string('grade')->nullable();
            $table->string('accepted_date')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student_profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_developments');
    }
};
