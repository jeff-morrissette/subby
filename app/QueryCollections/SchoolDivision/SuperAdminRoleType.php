<?php

namespace App\QueryCollections\SchoolDivision;

use App\SchoolDivision;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SchoolDivisionCollection()
	{
        $schoolDivisions = SchoolDivision::orderBy('name', 'asc')->get();

        return $schoolDivisions;
	}

}