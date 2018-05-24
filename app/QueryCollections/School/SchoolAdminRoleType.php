<?php

namespace App\QueryCollections\School;

use auth;
use App\SchoolAdministrator;

class SchoolAdminRoleType extends EmployeeRoleType {

	public function SchoolCollection()
	{
		$user = Auth::user();
        $schools = SchoolAdministrator::with(['school' => function ($query) {
                    $query->orderBy('name', 'asc');
                }, 'school.principal.myself'])->where('user_id', $user->id)->first();
        $schoolArray[] = $schools->school;
        return $schoolArray;
	}

}