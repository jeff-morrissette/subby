<?php

namespace App\QueryCollections\Principal;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function PrincipalCollection()
	{
		$user = Auth::user();
        $principals = SchoolDivisionAdministrator::with('schooldivision.schools.principal.myself')->where('user_id', $user->id)->first();

        return $principals;
	}

}