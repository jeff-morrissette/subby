<?php

namespace App\DBTransactions;

use App\SubDay;
use Carbon\Carbon;

class StoreSubDayHandler {

	public function execute(Array $request)
	{
        
      $sub_day = new SubDay;

      $sub_day->absent_day_day_start = Carbon::createFromFormat('Y-m-d', $request['absent_day_day_start'], 'America/Chicago');
      $sub_day->absent_day_day_end = Carbon::createFromFormat('Y-m-d', $request['absent_day_day_end'], 'America/Chicago');
      $sub_day->part_of_day = $request['part_of_day'];
      $sub_day->school_id = $request['school_id'];
      $sub_day->school_teacher_id = $request['school_teacher_id'];
      $sub_day->substitute_teacher_id = $request['substitute_teacher_id'];
      $sub_day->special_requirements = $request['special_requirements'];
      if (function_exists('random_bytes')) {
          $sub_day->sub_day_hash = bin2hex(random_bytes(3) . date("YmdHis"));
      } else {
          $sub_day->sub_day_hash = str_random(34);
      }

      $sub_day->save();

      return $sub_day;
	}

}