<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolTeacher;

class StoreTeacherHandler {

	public function execute(Array $request)
	{
        $TEACHER_ROLE_ID = 5;

        $new_user = new User;

        $new_user->name = $request['name'];
        $new_user->email = $request['email'];
        $new_user->password = bcrypt('secret');
        $new_user->remember_token = str_random(15);
        $new_user->save();

        $new_user->roles()->attach($TEACHER_ROLE_ID);

        $teacher = new SchoolTeacher;
        $teacher->user_id = $new_user->id;
        $teacher->school_id = $request['school_id'];
        $teacher->parking_stall = $request['parking_stall'];
        $teacher->classroom = $request['classroom'];
        $teacher->grade = $request['grade'];
        $teacher->save();

        return $new_user;
	}

}