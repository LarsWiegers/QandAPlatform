<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    protected $fillable = ['question_id', 'user_id', 'answer', 'created_at', 'updated_at'];
}
