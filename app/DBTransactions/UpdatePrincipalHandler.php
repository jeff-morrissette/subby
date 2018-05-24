<?php

namespace App\DBTransactions;

use App\User;
use App\Principal;

class UpdatePrincipalHandler {

	public function execute(Principal $principal, Array $request)
	{
        
        $updateUser = User::findorFail($principal->user_id);
        $updateUser->name = $request['name'];
        $updateUser->email = $request['email'];
        $updateUser->save();

        $principal->school_id = $request['school_id'];

        $principal->save();
	}

}