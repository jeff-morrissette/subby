<?php

namespace App\QueryCollections\SchoolDivisionAdministrator;

use App\SchoolDivisionAdministrator;

class SuperAdminRoleType extends EmployeeRoleType {

	public function SchoolDivisionAdminCollection()
	{
        $schoolDivisionAdmins = SchoolDivisionAdministrator::all();

        return $schoolDivisionAdmins;
	}

}