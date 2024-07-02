<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCourseRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('class_course_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_course_id');
            $table->unsignedBigInteger('student_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reason')->nullable();
            $table->timestamps();

            $table->foreign('class_course_id')->references('id')->on('class_courses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_course_requests');
    }
}
