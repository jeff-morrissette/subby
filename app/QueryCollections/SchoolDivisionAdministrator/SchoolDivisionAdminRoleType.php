<?php

namespace App\QueryCollections\SchoolDivisionAdministrator;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SchoolDivisionAdminCollection()
	{
		$user = Auth::user();
        $schoolDivisionAdmin = SchoolDivisionAdministrator::with(['myself', 'schooldivision'])->where('user_id', $user->id)->first();

        return $schoolDivisionAdmin;
	}

}