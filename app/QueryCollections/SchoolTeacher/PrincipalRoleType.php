<?php

namespace App\QueryCollections\SchoolTeacher;

use auth;
use App\Principal;

class PrincipalRoleType extends EmployeeRoleType {

	public function SchoolTeacherCollection()
	{
		$user = Auth::user();
        $teachers = Principal::with(['school.teachers.myself' => function ($query) {
                        $query->select('id', 'name');
                }])->where('user_id', $user->id)->first();

        return $teachers;
	}

}