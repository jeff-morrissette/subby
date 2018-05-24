<?php

namespace App\Http\Controllers;

use auth;
use App\School;
use App\Country;
use App\Province;
use App\DBTransactions\StoreSchoolHandler;
use App\QueryCollections\School\SchoolQuery;
use App\QueryCollections\SchoolDivision\SchoolDivisionQuery;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * SchoolController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.schools';

        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();

        return view($url, compact('user', 'schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.schools.create';

        $schoolDivisionQuery = new SchoolDivisionQuery;
        $schoolDivisionQuery->setType($role);
        $schoolDivisions = $schoolDivisionQuery->SchoolDivisionCollection();
        //dd($schoolDivisions);
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        return view($url, compact('user', 'schoolDivisions', 'provinces', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSchoolHandler $handler)
    {
        $this->validate($request, [
            'school_division_id' => 'required|exists:school_divisions,id',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'country_id' => 'required|exists:countries,id',
            'postal_code' => 'required',
            'start_time_hour' => 'required|in:07,08,09',
            'start_time_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'start_time_lunch_hour' => 'required|in:11,12',
            'start_time_lunch_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'end_time_lunch_hour' => 'required|in:12,13',
            'end_time_lunch_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'end_time_hour' => 'required|in:15,16',
            'end_time_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55'
        ]);

        $school = new School;
        $handler->execute($school, $request->all());
        
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_schools-' . $role;

        return redirect()->route($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.schools.edit';

        $schoolDivisionQuery = new SchoolDivisionQuery;
        $schoolDivisionQuery->setType($role);
        $schoolDivisions = $schoolDivisionQuery->SchoolDivisionCollection();
        $school = School::with('schooldivision')->findOrFail($id);
        //dd($school);
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        return view($url, compact('user', 'schoolDivisions', 'school', 'provinces', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreSchoolHandler $handler, $id)
    {
        $this->validate($request, [
            'school_division_id' => 'required|exists:school_divisions,id',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'country_id' => 'required|exists:countries,id',
            'postal_code' => 'required',
            'start_time_hour' => 'required|in:07,08,09',
            'start_time_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'start_time_lunch_hour' => 'required|in:11,12',
            'start_time_lunch_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'end_time_lunch_hour' => 'required|in:12,13',
            'end_time_lunch_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55',
            'end_time_hour' => 'required|in:15,16',
            'end_time_minute' => 'required|in:00,05,10,15,20,25,30,35,40,45,50,55'
        ]);

        $school = School::findOrFail($id);
        $handler->execute($school, $request->all());
        
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_schools-' . $role;

        return redirect()->route($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
