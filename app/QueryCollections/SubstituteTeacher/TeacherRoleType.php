<?php

namespace App\QueryCollections\SubstituteTeacher;

use auth;
use App\User;
use App\SchoolTeacher;

class TeacherRoleType extends EmployeeRoleType {

	public function SubstituteTeacherCollection()
	{
        $user = Auth::user();
        $teacher = SchoolTeacher::with('school.schooldivision.substituteteachers.myself')->where('user_id', $user->id)->first();
        return $teacher;
	}

}