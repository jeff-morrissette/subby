<?php

namespace App;

use App\User;
use App\School;
use App\SubDay;
use Illuminate\Database\Eloquent\Model;

class SchoolTeacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parking_stall', 'classroom', 'grade'
    ];

    protected $appends = ['schooldivision'];

    /**
     * Get the school that the teacher belongs to.
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the user that the teacher belongs to.
     */
    public function myself()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the subdays that the teacher belongs to.
     */
    public function subdays()
    {
        return $this->hasMany(SubDay::class);
    }

    public function getSchoolDivisionAttribute() {
        return $this->school->schooldivision;
    }
}
