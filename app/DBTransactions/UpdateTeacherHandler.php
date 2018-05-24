<?php

namespace App\DBTransactions;

use App\User;
use App\SchoolTeacher;

class UpdateTeacherHandler {

	public function execute(SchoolTeacher $teacher, Array $request)
	{
        
        $updateUser = User::findorFail($teacher->user_id);
        $updateUser->name = $request['name'];
        $updateUser->email = $request['email'];
        $updateUser->save();

        $teacher->school_id = $request['school_id'];
        $teacher->parking_stall = $request['parking_stall'];
        $teacher->classroom = $request['classroom'];
        $teacher->grade = $request['grade'];

        $teacher->save();
	}

}