<?php

namespace App\DBTransactions;

use App\School;
use Carbon\Carbon;

class StoreSchoolHandler {
	public function execute(School $school, Array $request)
	{
        $school->school_division_id = $request['school_division_id'];
        $school->name = $request['name'];
        $school->slug = str_replace(" ", "-", strtolower($request['name']));
        $school->address = $request['address'];
        $school->city = $request['city'];
        $school->province_id = $request['province_id'];
        $school->country_id = $request['country_id'];
        $school->postal_code = $request['postal_code'];
        $school->start_time_school = Carbon::createFromTime($request['start_time_hour'], $request['start_time_minute'], 0, 'America/Chicago')->format('Y-m-d H:i:s');
        $school->start_time_lunch = Carbon::createFromTime($request['start_time_lunch_hour'], $request['start_time_lunch_minute'], 0, 'America/Chicago')->format('Y-m-d H:i:s');
        $school->end_time_lunch = Carbon::createFromTime($request['end_time_lunch_hour'], $request['end_time_lunch_minute'], 0, 'America/Chicago')->format('Y-m-d H:i:s');
        $school->end_time_school = Carbon::createFromTime($request['end_time_hour'], $request['end_time_minute'], 0, 'America/Chicago')->format('Y-m-d H:i:s');

        $school->save();
	}
}