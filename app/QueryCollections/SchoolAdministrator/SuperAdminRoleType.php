<?php

namespace App\QueryCollections\SchoolAdministrator;

use App\SchoolAdministrator;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SchoolAdminCollection()
	{
        $schoolAdmins = SchoolAdministrator::with(['myself', 'school'])->get();

        return $schoolAdmins;
	}

}