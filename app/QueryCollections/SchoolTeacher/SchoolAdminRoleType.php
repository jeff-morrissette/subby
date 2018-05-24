<?php

namespace App\QueryCollections\SchoolTeacher;

use auth;
use App\SchoolAdministrator;

class SchoolAdminRoleType extends EmployeeRoleType {

	public function SchoolTeacherCollection()
	{
		$user = Auth::user();
        $teachers = SchoolAdministrator::with(['school.principal.myself' => function ($query) {
                $query->select('id', 'name');
        }, 'school.teachers.myself' => function ($query) {
                $query->select('id', 'name');
        }])->where('user_id', $user->id)->first();

        return $teachers;
	}

}