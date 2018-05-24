<?php

namespace App\QueryCollections\School;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SchoolCollection()
	{
		$user = Auth::user();
        $schools = SchoolDivisionAdministrator::with(['schooldivision.schools' => function ($query) {
                    $query->orderBy('name', 'asc');
                }])->where('user_id', $user->id)->first();

        return $schools;
	}

}