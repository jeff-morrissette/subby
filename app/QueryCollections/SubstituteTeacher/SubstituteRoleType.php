<?php

namespace App\QueryCollections\SubstituteTeacher;

use auth;
use App\User;
use App\SubstituteTeacher;

class SubstituteRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
        $user = Auth::user();
        $substituteTeachers = SubstituteTeacher::with(['dayofsubstitution' => function ($query) {
                $query->orderBy('absent_day_day_start', 'desc');
        }, 'dayofsubstitution.school', 'dayofsubstitution.schoolTeacher.myself'])->where('user_id', $user->id)->first();
        return $substituteTeachers;
	}

}