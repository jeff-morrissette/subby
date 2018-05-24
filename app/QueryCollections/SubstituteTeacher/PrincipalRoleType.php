<?php

namespace App\QueryCollections\SubstituteTeacher;

use auth;
use App\User;
use App\Principal;

class PrincipalRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
        $user = Auth::user();
        $substituteteacher = Principal::with('school.schooldivision.substituteteachers.myself')->where('user_id', $user->id)->first();
        return $substituteteacher;
	}

}