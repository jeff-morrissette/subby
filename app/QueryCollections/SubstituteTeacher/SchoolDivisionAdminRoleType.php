<?php

namespace App\QueryCollections\SubstituteTeacher;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
		$user = Auth::user();
        $substituteTeachers = SchoolDivisionAdministrator::with('schooldivision.substituteteachers.myself')->where('user_id', $user->id)->first();

        return $substituteTeachers;
	}

}