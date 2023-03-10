<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidates';

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
    protected $fillable = ['name', 'age', 'gender', 'birthdate', 'phone_number', 'email', 'job_id', 'access_key'];

    
}
