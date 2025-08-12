<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'question_id', 'answer_text'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
