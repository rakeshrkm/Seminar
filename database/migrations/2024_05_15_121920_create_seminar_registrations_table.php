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
        Schema::create('seminar_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('NO ACTION');
            $table->unsignedBigInteger('college_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('mobile');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('current_course')->nullable();
            $table->string('course_name')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', [0,1]);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_registrations');
    }
};
