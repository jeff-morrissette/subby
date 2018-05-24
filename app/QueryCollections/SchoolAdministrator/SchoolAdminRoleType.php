<?php

namespace App\QueryCollections\SchoolAdministrator;

use auth;
use App\SchoolAdministrator;

class SchoolAdminRoleType extends EmployeeRoleType {

	public function SchoolAdminCollection()
	{
		$user = Auth::user();
        $schoolAdmins = SchoolAdministrator::with(['school'])->where('user_id', $user->id)->first();

        return $schoolAdmins;
	}

}