<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $primaryKey = 'section_id';

    protected $fillable = [
        'name', 'order_no', 'duration'
    ];

    public function questionGroups()
    {
        return $this->hasMany(QuestionGroup::class, 'section_id');
    }
}
