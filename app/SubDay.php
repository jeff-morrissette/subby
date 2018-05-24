<?php

namespace App;

use App\School;
use App\Subtask;
use App\SchoolTeacher;
use App\SubstituteTeacher;
use Illuminate\Database\Eloquent\Model;

class SubDay extends Model
{
	/**
     * Get the tasks that the subday belongs to.
     */
    public function tasks()
    {
        return $this->hasMany(Subtask::class);
    }

    /**
     * Get the substitute teacher that the subday belongs to.
     */
    public function substituteTeacher()
    {
        return $this->belongsTo(SubstituteTeacher::class, 'substitute_teacher_id');
    }

    /**
     * Get the school that the subday belongs to.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the school teacher that the subday belongs to.
     */
    public function schoolTeacher()
    {
        return $this->belongsTo(SchoolTeacher::class, 'school_teacher_id');
    }
}
