<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('question_option_id');
            $table->unsignedInteger('correct')->default(0);
            $table->unsignedInteger('option_index')->default(0);
            $table->foreign('exam_id')->on('exams')->references('id');
            $table->foreign('student_id')->on('exams')->references('id');
            $table->foreign('question_id')->on('questions')->references('id');
            $table->foreign('question_option_id')->on('question_options')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_asnwers');
    }
}
