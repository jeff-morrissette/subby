<?php

namespace App\DBTransactions;

use App\SubVacation;

class StoreSubVacationDayHandler {

	public function execute(Array $request)
	{
        
      $sub_vacation = new SubVacation;

      $sub_vacation->substitute_teacher_id = $request['substitute_teacher_id'];
      $sub_vacation->vacation_day = $request['vacation_day'];
      $sub_vacation->save();
	}

}