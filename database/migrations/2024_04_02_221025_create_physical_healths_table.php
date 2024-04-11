<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('physical_healths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('year')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('diease')->nullable();
            $table->string('physical_abnormalities')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student_profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_healths');
    }
};
