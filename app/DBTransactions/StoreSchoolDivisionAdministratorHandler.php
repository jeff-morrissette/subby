<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolDivisionAdministrator;

class StoreSchoolDivisionAdministratorHandler {

	public function execute(Array $request)
	{
        $SCHOOL_DIVISION_ADMIN_ROLE_ID = 2;
        $DIGITS = 4;

        $new_user = new User;

        $new_user->name = $request['name'];
        $new_user->email = $request['email'];
        $new_user->password = bcrypt('secret');
        $new_user->remember_token = str_random(15);
        $new_user->confirmation_token = str_random(25);
        $new_user->access_token = str_pad(rand(0, pow(10, $DIGITS)-1), $DIGITS, '0', STR_PAD_LEFT);
        $new_user->save();

        $new_user->roles()->attach($SCHOOL_DIVISION_ADMIN_ROLE_ID);

        $schoolDivisionAdministrator = new SchoolDivisionAdministrator;
        $schoolDivisionAdministrator->user_id = $new_user->id;
        $schoolDivisionAdministrator->school_division_id = $request['school_division_id'];
        $schoolDivisionAdministrator->save();

        return $new_user;
	}

}