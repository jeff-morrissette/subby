<?php

namespace App\DBTransactions;

use App\SchoolDivision;

class StoreSchoolDivisionHandler {

	public function execute(SchoolDivision $schooldivision, Array $request)
	{
        $schooldivision->name = $request['name'];
        $schooldivision->slug = str_replace(" ", "-", strtolower($request['name']));
        $schooldivision->address = $request['address'];
        $schooldivision->city = $request['city'];
        $schooldivision->province_id = $request['province_id'];
        $schooldivision->country_id = $request['country_id'];
        $schooldivision->postal_code = $request['postal_code'];

        $schooldivision->save();
	}

}
