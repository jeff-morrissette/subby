<?php

namespace App;

use App\User;
use App\SchoolDivision;
use Illuminate\Database\Eloquent\Model;

class SchoolDivisionAdministrator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Get the user that the teacher belongs to.
     */
    public function myself()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the school division that the administrator belongs to.
     */
    public function schooldivision()
    {
        return $this->belongsTo(SchoolDivision::class, 'school_division_id');
    }
}
