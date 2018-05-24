<?php

namespace App\QueryCollections\SchoolTeacher;

use App\SchoolTeacher;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SchoolTeacherCollection()
	{
        $teachers = SchoolTeacher::with(['myself' => function ($query) {
                $query->select('id', 'name');
        }, 'school'])->get();

        return $teachers;
	}

}