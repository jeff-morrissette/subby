<?php

namespace App\QueryCollections\SchoolTeacher;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SchoolTeacherCollection()
	{
		$user = Auth::user();
        $teachers = SchoolDivisionAdministrator::with('schooldivision.schools.teachers')->where('user_id', $user->id)->first();

        return $teachers;
	}

}