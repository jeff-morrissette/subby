<?php

namespace App;

use App\User;
use App\School;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
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
     * Get the school that the principal belongs to.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the user that the principal belongs to.
     */
    public function myself()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
