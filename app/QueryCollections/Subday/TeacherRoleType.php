<?php

namespace App\QueryCollections\Subday;

use auth;
use App\User;
use App\SchoolTeacher;

class TeacherRoleType extends SubdayRoleType {

	public function SubdayCollection()
	{
        $user = Auth::user();
        $subdays = SchoolTeacher::with(['school.subday' => function ($query) {
                    $query->orderBy('absent_day_day_start', 'desc');
                }, 'school.subday.schoolTeacher', 'school.subday.substituteTeacher'])->where('user_id', $user->id)->first();
        return $subdays;
	}

}