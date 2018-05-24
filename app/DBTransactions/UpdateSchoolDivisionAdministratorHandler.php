<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolDivisionAdministrator;

class UpdateSchoolDivisionAdministratorHandler {

	public function execute(SchoolDivisionAdministrator $schoolDivisionAdministrator, Array $request)
	{
        
        $updateUser = User::findorFail($schoolDivisionAdministrator->user_id);
        $updateUser->name = $request['name'];
        $updateUser->email = $request['email'];
        $updateUser->save();

        $schoolDivisionAdministrator->school_division_id = $request['schooldivision_id'];

        $schoolDivisionAdministrator->save();
	}

}