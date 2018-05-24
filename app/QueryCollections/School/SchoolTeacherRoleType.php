<?php

namespace App\QueryCollections\School;

use auth;
use App\SchoolTeacher;

class SchoolTeacherRoleType extends EmployeeRoleType {

	public function SchoolCollection()
	{
		$user = Auth::user();
        $schools = SchoolTeacher::with('school')->where('user_id', $user->id)->first();
        $schoolArray[] = $schools->school;
        return $schoolArray;
	}

}