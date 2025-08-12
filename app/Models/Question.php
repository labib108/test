<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'question_id';

    protected $fillable = [
        'group_id', 'type', 'text', 'media_file', 'marks', 'order_no'
    ];

    public function questionGroup()
    {
        return $this->belongsTo(QuestionGroup::class, 'group_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function answers()
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id');
    }
}
