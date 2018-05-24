<?php

namespace App\Http\Controllers;

use auth;
use App\Role;
use App\User;
use App\SuperAdmin;
use App\SchoolDivision;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
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
        $roles = Role::with('permissions')->get();
        $schooldivisions = SchoolDivision::with('administrators.myself')->get();
        $user = Auth::user();
        //$school = School::find(5);
        //$schooldivisionsByID = SchoolDivision::find(1);
        //$subdays = SubDay::where('school_teacher_id', $user->teacher->id)->get();

        //dd($user->roles()->first()->slug);
        //dd($subdays);
        //foreach ($schooldivisionsByID->substituteteachers as $substituteteacher) {
       //     $temp = $this->getSubstituteTeacherName($substituteteacher->id);
            //var_dump($temp);
       // }
    
        //dd($schooldivisionsByID->substituteteachers());
        return view('dashboard/super_administrator', compact('roles', 'schooldivisions', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }

}
