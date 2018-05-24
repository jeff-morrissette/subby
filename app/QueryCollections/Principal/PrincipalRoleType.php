<?php

namespace App\QueryCollections\Principal;

use auth;
use App\Principal;

class PrincipalRoleType extends EmployeeRoleType {

	public function PrincipalCollection()
	{
		$user = Auth::user();
        $principals = Principal::with('school')->where('user_id', $user->id)->first();

        return $principals;
	}

}