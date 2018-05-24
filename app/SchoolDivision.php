<?php

namespace App;

use App\School;
use App\SubstituteTeacher;
use App\SchoolDivisionAdministrator;
use Illuminate\Database\Eloquent\Model;

class SchoolDivision extends Model
{
    protected $fillable = [
        'name', 'slug', 'address', 'city', 'postal_code'
    ];


    /**
     * Get the comments for the blog post.
     */
    public function administrators()
    {
        return $this->hasMany(SchoolDivisionAdministrator::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function substituteteachers()
    {
        return $this->belongsToMany(SubstituteTeacher::class, 'schooldivision_substituteteacher', 'school_division_id', 'substitute_teacher_id');
    }
}
