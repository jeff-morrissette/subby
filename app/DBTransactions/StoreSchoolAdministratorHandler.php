<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolAdministrator;

class StoreSchoolAdministratorHandler {

	public function execute(Array $request)
	{
        $SCHOOL_ADMIN_ROLE_ID = 3;

        $new_user = new User;

        $new_user->name = $request['name'];
        $new_user->email = $request['email'];
        $new_user->password = bcrypt('secret');
        $new_user->remember_token = str_random(15);
        $new_user->save();

        $new_user->roles()->attach($SCHOOL_ADMIN_ROLE_ID);

        $schoolAdministrator = new SchoolAdministrator;
        $schoolAdministrator->user_id = $new_user->id;
        $schoolAdministrator->school_id = $request['school_id'];
        $schoolAdministrator->save();

        return $new_user;
	}

}