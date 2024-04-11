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
        Schema::create('student_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('assesment_id')->nullable();
            $table->integer('score_num')->nullable();
            $table->string('score_let')->nullable();
            $table->string('comment')->nullable();
            $table->enum('semester', ['1', '2']);
            // $table->string('period')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'assesment_id', 'class_id', 'semester'], 'student_assessments_unique');
            $table->foreign('student_id')->references('id')->on('student_profiles');
            $table->foreign('class_id')->references('id')->on('classrooms');
            $table->foreign('assesment_id')->references('id')->on('assessments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_assessments');
    }
};
