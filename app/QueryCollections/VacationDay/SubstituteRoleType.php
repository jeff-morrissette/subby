<?php

namespace App\QueryCollections\VacationDay;

use auth;
use App\User;
use App\SubstituteTeacher;

class SubstituteRoleType extends EmployeeRoleType {

	public function VacationDayCollection()
	{
        $user = Auth::user();
        $subVacationDay = SubstituteTeacher::with(['vacationdays' => function ($query) {
                $query->orderBy('vacation_day', 'asc');
        }])->where('user_id', $user->id)->first();
        return $subVacationDay;
	}

}