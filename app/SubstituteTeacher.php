<?php

namespace App;

use App\SubDay;
use App\SchoolDivision;
use App\SubVacation;
use Illuminate\Database\Eloquent\Model;

class SubstituteTeacher extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'city', 'province_id', 'country_id', 'postal_code', 'phone'
    ];

    public function schooldivisions()
    {
        return $this->belongsToMany(SchoolDivision::class, 'schooldivision_substituteteacher', 'substitute_teacher_id', 'school_division_id');
    }

    /**
     * Get the user that the substitute teacher belongs to.
     */
    public function myself()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that the substitute teacher belongs to.
     */
    public function dayofsubstitution()
    {
        return $this->hasMany(SubDay::class);
    }

    /**
     * Get the vacation days that the substitute teacher has.
     */
    public function vacationdays()
    {
        return $this->hasMany(SubVacation::class, 'substitute_teacher_id');
    }
}
