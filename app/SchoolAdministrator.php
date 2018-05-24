<?php

namespace App;

use App\User;
use App\School;
use Illuminate\Database\Eloquent\Model;

class SchoolAdministrator extends Model
{
    /**
     * Get the school division that the administrator belongs to.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the user that the school administrator belongs to.
     */
    public function myself()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
