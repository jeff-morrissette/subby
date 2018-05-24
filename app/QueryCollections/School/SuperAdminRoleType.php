<?php

namespace App\QueryCollections\School;

use App\School;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SchoolCollection()
	{
        $schools = School::with('schooldivision')->orderBy('school_division_id', 'desc')->get();

        return $schools;
	}

}