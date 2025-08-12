<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionGroup extends Model
{
    protected $primaryKey = 'group_id';

    protected $fillable = [
        'section_id', 'title', 'description', 'media_file', 'order_no'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'group_id');
    }
}
