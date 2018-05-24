<?php

namespace App\QueryCollections\SubstituteTeacher;

use App\SubstituteTeacher;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
        $substituteTeachers = SubstituteTeacher::with(['myself', 'schooldivisions'])->get();

        return $substituteTeachers;
	}

}