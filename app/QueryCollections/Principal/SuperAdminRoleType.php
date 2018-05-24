<?php

namespace App\QueryCollections\Principal;

use App\Principal;

class SuperAdminRoleType extends EmployeeRoleType {

	public function PrincipalCollection()
	{
        $principals = Principal::with(['myself', 'school'])->get();

        return $principals;
	}

}