<?php

namespace App\DBTransactions;

use App\User;
use App\SubstituteTeacher;

class UpdateSubstituteTeacherHandler {

	public function execute(SubstituteTeacher $substituteTeacher, Array $request)
	{
        
        $updateUser = User::findorFail($substituteTeacher->user_id);
        $updateUser->name = $request['name'];
        $updateUser->email = $request['email'];
        $updateUser->save();

        $substituteTeacher->address = $request['address'];
        $substituteTeacher->city = $request['city'];
        $substituteTeacher->province_id = $request['province_id'];
        $substituteTeacher->country_id = $request['country_id'];
        $substituteTeacher->postal_code = $request['postal_code'];
        $substituteTeacher->phone = $request['phone'];
        $substituteTeacher->save();
	}

}