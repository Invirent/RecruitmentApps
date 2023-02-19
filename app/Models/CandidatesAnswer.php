<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatesAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidates_answers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['candidate_id', 'quiz_id', 'answer_choose_id', 'scored_answer', 'is_correct_answer'];

    
}
