<?php

namespace App\Http\Controllers;

use auth;
use DB;
use App\Role;
use App\School;
use App\SubDay;
use App\SchoolDivision;
use App\SubstituteTeacher;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $schooldivisions = SchoolDivision::with('administrators.user')->get();
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
        return view('dashboard', compact('roles', 'schooldivisions', 'user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    private function getSubstituteTeacherName($id)
    {
        return SubstituteTeacher::find($id)->myself->name;
    }
}
