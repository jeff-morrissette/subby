<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolAdministrator;

class UpdateSchoolAdministratorHandler {

	public function execute(SchoolAdministrator $schoolAdministrator, Array $request)
	{
        
        $updateUser = User::findorFail($schoolAdministrator->user_id);
        $updateUser->name = $request['name'];
        $updateUser->email = $request['email'];
        $updateUser->save();

        $schoolAdministrator->school_id = $request['school_id'];

        $schoolAdministrator->save();
	}

}