<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\SubVacation;
use App\DBTransactions\StoreSubVacationDayHandler;
use App\QueryCollections\SubstituteTeacher\SubstituteteacherQuery;
use App\QueryCollections\VacationDay\VacationDayQuery;
use Illuminate\Http\Request;

class SubVacationController extends Controller
{
    /**
     * SubVacationController constructor.
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
        $url = 'dashboard.' . $role . '.vacation';
        if ($role != 'substitute_teacher') {
            $url = $url . '.substitute_teachers';
        }
        $subVacationquery = new VacationDayQuery;
        $subVacationquery->setType($role);
        $subvacationday = $subVacationquery->VacationDayCollection();
        //dd($subvacationday);
        return view($url, compact('user', 'subvacationday'));
        //return view('dashboard/substitute_teacher/vacation', compact('user'));
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
        $url = 'dashboard.' . $role . '.vacation.create';
        if ($role != 'substitute_teacher') {
            $url = $url . '.substitute_teachers';
        }

        $subVacationquery = new VacationDayQuery;
        $subVacationquery->setType($role);
        $subvacationday = $subVacationquery->VacationDayCollection();

        return view($url, compact('user', 'subvacationday'));
        //return view('dashboard/substitute_teacher/vacation/create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSubVacationDayHandler $handler)
    {
    	$this->validate($request, [
                'vacation_day' => 'required',
            ]);
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        
        $substituteteacherquery = new SubstituteteacherQuery;
        $substituteteacherquery->setType($role);
        $substituteteacher = $substituteteacherquery->SubstituteTeacherCollection();
        
        try {
            $request['substitute_teacher_id'] = $substituteteacher->id;
            $handler->execute($request->all());
        } catch (\Exception $e) {
            return response(
                $e . ' Sorry, your reply could not be saved at this time.', 422
            );
        }

        $url = 'view_vacationdays-' . $role;

        return redirect()->route($url);
    }
}
