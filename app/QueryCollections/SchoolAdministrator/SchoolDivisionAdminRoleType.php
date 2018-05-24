<?php

namespace App\QueryCollections\SchoolAdministrator;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SchoolAdminCollection()
	{
		$user = Auth::user();
        $schoolAdmins = SchoolDivisionAdministrator::with(['schooldivision.schools.administrators.myself'])->where('user_id', $user->id)->first();

        return $schoolAdmins;
	}

}