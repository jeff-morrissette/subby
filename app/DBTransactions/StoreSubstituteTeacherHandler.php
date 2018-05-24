<?php

namespace App\DBTransactions;

use App\User;
use App\SubstituteTeacher;

class StoreSubstituteTeacherHandler {

	public function execute(Array $request, $schoolDivisionID)
	{
        $SUBSTITUTE_TEACHER_ROLE_ID = 6;

        $new_user = new User;

        $new_user->name = $request['name'];
        $new_user->email = $request['email'];
        $new_user->password = bcrypt('secret');
        $new_user->remember_token = str_random(15);
        $new_user->save();

        $new_user->roles()->attach($SUBSTITUTE_TEACHER_ROLE_ID);

        $substituteTeacher = new SubstituteTeacher;
        $substituteTeacher->user_id = $new_user->id;
        $substituteTeacher->address = $request['address'];
        $substituteTeacher->city = $request['city'];
        $substituteTeacher->province_id = $request['province_id'];
        $substituteTeacher->country_id = $request['country_id'];
        $substituteTeacher->postal_code = $request['postal_code'];
        $substituteTeacher->phone = $request['phone'];
        $substituteTeacher->save();

        $substituteTeacher->schooldivisions()->attach($schoolDivisionID);

        return $new_user;
	}

}