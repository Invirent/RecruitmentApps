<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sequence')->nullable();
            $table->text('question')->nullable();
            $table->boolean('required')->nullable();
            $table->boolean('is_scored_answer')->nullable();
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('quiz_templates')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizzes');
    }
}
