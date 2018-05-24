<?php

namespace App\DBTransactions;

use App\User;
use App\Principal;

class StorePrincipalHandler {

	public function execute(Array $request)
	{
        $PRINCIPAL_ROLE_ID = 4;

        $new_user = new User;

        $new_user->name = $request['name'];
        $new_user->email = $request['email'];
        $new_user->password = bcrypt('secret');
        $new_user->remember_token = str_random(15);
        $new_user->save();

        $new_user->roles()->attach($PRINCIPAL_ROLE_ID);

        $principal = new Principal;
        $principal->user_id = $new_user->id;
        $principal->school_id = $request['school_id'];
        $principal->save();

        return $new_user;
	}

}