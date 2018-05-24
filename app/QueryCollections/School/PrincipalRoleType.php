<?php

namespace App\QueryCollections\School;

use auth;
use App\Principal;

class PrincipalRoleType extends EmployeeRoleType {

	public function SchoolCollection()
	{
		$user = Auth::user();
        $schools = Principal::with('school')->where('user_id', $user->id)->first();
        $schoolArray[] = $schools->school;
        return $schoolArray;
	}

}