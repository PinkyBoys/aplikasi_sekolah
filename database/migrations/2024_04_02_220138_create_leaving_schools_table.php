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
        Schema::create('leaving_schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('graduate_year')->nullable();
            $table->string('diploma_number')->nullable();
            $table->string('continue')->nullable();
            $table->boolean('is_transfer')->nullable();
            $table->string('from_grade')->nullable();
            $table->string('to_grade')->nullable();
            $table->string('date')->nullable();
            $table->boolean('is_dropout')->nullable();
            $table->string('drop_date')->nullable();
            $table->string('drop_reason')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student_profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaving_schools');
    }
};
