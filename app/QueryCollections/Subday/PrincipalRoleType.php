<?php

namespace App\QueryCollections\Subday;

use auth;
use App\User;
use App\Principal;

class PrincipalRoleType extends SubdayRoleType {

	public function SubdayCollection()
	{
        $user = Auth::user();
        $subdays = Principal::with(['school.teachers.myself', 'school.schooldivision.substituteteachers.myself', 'school.subday' => function ($query) {
                    $query->orderBy('absent_day_day_start', 'desc');
                }, 'school.subday.schoolTeacher', 'school.subday.substituteTeacher'])->where('user_id', $user->id)->first();

        return $subdays;
	}

}