<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\SubDay;
use App\Country;
use App\Province;
use App\SubstituteTeacher;
use App\DBTransactions\StoreSubstituteTeacherHandler;
use App\DBTransactions\UpdateSubstituteTeacherHandler;
use App\QueryCollections\SchoolDivision\SchoolDivisionQuery;
use App\QueryCollections\SubstituteTeacher\SubstituteteacherQuery;
use Illuminate\Http\Request;

class SubstituteTeacherController extends Controller
{
    /**
     * SubstituteTeacherController constructor.
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
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role;
        if ($role != 'substitute_teacher') {
            $url = $url . '.substitute_teachers';
        }
        $substituteteacherquery = new SubstituteteacherQuery;
        $substituteteacherquery->setType($role);
        $substituteteacher = $substituteteacherquery->SubstituteTeacherCollection();
        //dd($substituteteacher);
        return view($url, compact('user', 'substituteteacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.substitute_teachers.create';

        $schooldivisionquery = new SchoolDivisionQuery;
        $schooldivisionquery->setType($role);
        $schoolDivision = $schooldivisionquery->SchoolDivisionCollection();
        //dd($schoolDivision);
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view($url, compact('user', 'schoolDivision', 'provinces', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSubstituteTeacherHandler $handler)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'country_id' => 'required|exists:countries,id',
            'postal_code' => 'required|string|max:255',
            'phone' => 'required|string|max:12'
        ]);

        $user = Auth::user();
        $role = $user->roles[0]->slug;

        if ($role == 'school_division_administrator') {
            $schooldivisionquery = new SchoolDivisionQuery;
            $schooldivisionquery->setType($role);
            $schoolDivision = $schooldivisionquery->SchoolDivisionCollection();
            $schoolDivisionID = $schoolDivision[0]->id;
        } else {
            $schoolDivisionID = $request->schooldivision_id;
        }

        try {
            $handler->execute($request->all(), $schoolDivisionID);
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $url = 'view_substitute_teachers-' . $role;

        return redirect()->route($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubstituteTeacher  $substituteTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.substitute_teachers.edit';

        $substituteTeacher = SubstituteTeacher::with(['myself', 'schooldivisions'])->findOrFail($id);
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        $schooldivisionquery = new SchoolDivisionQuery;
        $schooldivisionquery->setType($role);
        $schoolDivision = $schooldivisionquery->SchoolDivisionCollection();

        return view($url, compact('user', 'schoolDivision', 'substituteTeacher', 'provinces', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubstituteTeacher  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateSubstituteTeacherHandler $handler, $id)
    { 
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'country_id' => 'required|exists:countries,id',
            'postal_code' => 'required|string|max:255',
            'phone' => 'required|string|max:12'
        ]);

        try {
            $substituteTeacher = SubstituteTeacher::findOrFail($id);
            $handler->execute($substituteTeacher, $request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_substitute_teachers-' . $role;

        return redirect()->route($url);
    }
}
