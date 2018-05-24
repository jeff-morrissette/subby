<?php

namespace App\QueryCollections\SchoolTeacher;

use auth;
use App\SchoolTeacher;

class SchoolTeacherRoleType extends EmployeeRoleType {

	public function SchoolTeacherCollection()
	{
		$user = Auth::user();
        $teacher = SchoolTeacher::with(['myself' => function ($query) {
                $query->select('id', 'name');
        }, 'school' => function ($query) {
                $query->select('id', 'name');
        }])->where('user_id', $user->id)->first();
        //dd($teacher);
        $teacherarray[] = $teacher;
        return $teacherarray;
	}

}