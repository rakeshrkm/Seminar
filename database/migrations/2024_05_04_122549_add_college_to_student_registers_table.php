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
        Schema::table('student_registers', function (Blueprint $table) {
            $table->string('college_university');
            $table->string('college_university_course_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_registers', function (Blueprint $table) {
            $table->dropColumn('college_university');
            $table->dropColumn('college_university_course_name');
        });
    }
};
