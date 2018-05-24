<?php

namespace App\QueryCollections\SchoolDivision;

use auth;
use App\SchoolDivisionAdministrator;

class SchoolDivisionAdminRoleType extends EmployeeRoleType {

	public function SchoolDivisionCollection()
	{
		$user = Auth::user();
        $schoolDivisions = SchoolDivisionAdministrator::with(['schooldivision' => function ($query) {
            $query->select('id', 'name');
        }])->where('user_id', $user->id)->first();
        $schoolDivisionArray[] = $schoolDivisions->schooldivision;
        return $schoolDivisionArray;
	}
}