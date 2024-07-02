<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToClassCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('class_courses', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->after('description');
        });
    }

    public function down()
    {
        Schema::table('class_courses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
