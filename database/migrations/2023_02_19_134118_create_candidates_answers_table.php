<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCandidatesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('candidate_id')->nullable();
            $table->integer('quiz_id')->nullable();
            $table->integer('answer_choose_id')->nullable();
            $table->boolean('scored_answer')->nullable();
            $table->boolean('is_correct_answer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('candidates_answers');
    }
}
