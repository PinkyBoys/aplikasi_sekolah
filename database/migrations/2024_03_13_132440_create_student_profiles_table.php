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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('religion')->nullable();
            $table->enum('nationality', ['WNI', 'WNA'])->default('WNI');
            $table->integer('siblings_count')->nullable();
            $table->string('daily_language')->nullable();
            $table->string('blood_type')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('residence_type')->nullable();
            $table->string('school_distance')->nullable();
            $table->string('img')->nullable();
            $table->enum('status', ['lulus', 'aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
