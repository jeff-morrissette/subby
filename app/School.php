<?php

namespace App;

use App\SubDay;
use App\Principal;
use App\SchoolTeacher;
use App\SchoolDivision;
use App\SchoolAdministrator;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'address', 'city', 'postal_code', 'start_time_school', 'start_time_lunch', 'end_time_lunch', 'end_time_school'
    ];

    /**
     * Get the principal associated with the school.
     */
    public function principal()
    {
        return $this->hasOne(Principal::class, 'school_id');
    }

    /**
     * Grab all Administrators associated with the school
     */
    public function administrators()
    {
        return $this->hasMany(SchoolAdministrator::class);
    }

    /**
     * Grab all Administrators associated with the school
     */
    public function teachers()
    {
        return $this->hasMany(SchoolTeacher::class);
    }

    /**
     * Get the school division that the school belongs to.
     */
    public function schooldivision()
    {
        return $this->belongsTo(SchoolDivision::class, 'school_division_id');
    }

    /**
     * Get the substitute days that the school has.
     */
    public function subday()
    {
        return $this->hasMany(SubDay::class, 'school_id');
    }
}
