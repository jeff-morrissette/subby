<?php

namespace App\QueryCollections\Subday;

use auth;
use App\User;
use App\SubstituteTeacher;

class SubstituteRoleType extends SubdayRoleType {

	public function SubdayCollection()
	{
        $user = Auth::user();
        $substituteTeacher = SubstituteTeacher::with(['dayofsubstitution' => function ($query) {
                $query->orderBy('absent_day_day_start', 'desc');
        }, 'dayofsubstitution.school', 'dayofsubstitution.schoolTeacher.myself'])->where('user_id', $user->id)->first();
        return $substituteTeacher;
	}

}