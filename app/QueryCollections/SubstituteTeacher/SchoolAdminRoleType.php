<?php

namespace App\QueryCollections\SubstituteTeacher;

use auth;
use App\User;
use App\SchoolAdministrator;

class SchoolAdminRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
        $user = Auth::user();
        $substituteteacher = SchoolAdministrator::with(['school.principal.myself', 'school.schooldivision.substituteteachers.myself'])->where('user_id', $user->id)->first();
        return $substituteteacher;
	}

}