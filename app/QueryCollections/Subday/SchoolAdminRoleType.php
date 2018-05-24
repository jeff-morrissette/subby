<?php

namespace App\QueryCollections\Subday;

use auth;
use App\User;
use App\SchoolAdministrator;

class SchoolAdminRoleType extends SubdayRoleType {

	public function SubdayCollection()
	{
        $user = Auth::user();
        $schoolAdmin = SchoolAdministrator::with(['school.principal.myself', 'school.teachers.myself', 'school.schooldivision.substituteteachers.myself', 'school.subday' => function ($query) {
                    $query->orderBy('absent_day_day_start', 'desc');
                }, 'school.subday.schoolTeacher', 'school.subday.substituteTeacher'])->where('user_id', $user->id)->first();
        //dd($teacher);
        return $schoolAdmin;
	}

}