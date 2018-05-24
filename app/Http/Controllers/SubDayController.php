<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\SubDay;
use App\SubstituteTeacher;
use App\DBTransactions\StoreSubDayHandler;
use App\QueryCollections\School\SchoolQuery;
use App\QueryCollections\Subday\SubdayQuery;
use App\QueryCollections\SchoolTeacher\SchoolTeacherQuery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubDayController extends Controller
{
    /**
     * SchoolTeacherController constructor.
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
        $url = 'dashboard.' . $role . '.subdays';
        
        $subdayquery = new SubdayQuery;
        $subdayquery->setType($role);
        $subday = $subdayquery->SubdayCollection();
        
        return view($url, compact('user', 'subday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.substitute_bookings.create';
        $schoolteacherquery = new SchoolTeacherQuery;
        $schoolteacherquery->setType($role);
        $teacher = $schoolteacherquery->SchoolTeacherCollection();

        $subTeacher = SubstituteTeacher::with(['myself', 'dayofsubstitution', 'vacationdays'])->findOrFail($id);

        $bookedDayArray = array();
        $today = Carbon::now('America/Chicago');
        //echo  nl2br ("today " . $today . "\n\n");
        foreach ($subTeacher->dayofsubstitution as $bookedDay) {
            //echo  nl2br ("temptoday " . $bookedDay->absent_day_day_start . "\n\n");
            $tempdaystart = Carbon::createFromFormat('Y-m-d H:i:s', $bookedDay->absent_day_day_start);
            $tempdayend = Carbon::createFromFormat('Y-m-d H:i:s', $bookedDay->absent_day_day_end);
           // echo $tempday;
            if ($today->lte($tempdaystart)) {
                array_push($bookedDayArray, $tempdaystart->toDateString());
                if ($tempdaystart->ne($tempdayend)) {
                    $totalsubdays = $tempdaystart->diffInDays($tempdayend);
                    for ($i=0; $i < $totalsubdays; $i++) { 
                        //echo  nl2br ($tempdaystart->addDay()  . "\n");
                        $tempdaystart->addDay();
                        array_push($bookedDayArray, $tempdaystart->toDateString());
                    }
                }
                
            }
        }

        foreach ($subTeacher->vacationdays as $vacationBookedDay) {
            //echo  nl2br ("temptoday " . $bookedDay->absent_day_day_start . "\n\n");
            $vacationDay = Carbon::createFromFormat('Y-m-d H:i:s', $vacationBookedDay->vacation_day);

            array_push($bookedDayArray, $vacationDay->toDateString());
        }
        //dd($bookedDayArray);
        return view($url, compact('user', 'teacher', 'subTeacher', 'bookedDayArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSubDayHandler $handler)
    {
        $this->validate($request, [
            'absent_day_day_start' => 'required',
            'absent_day_day_end' => 'required',
            'part_of_day' => 'required|string',
            'substitute_teacher_id' => 'required|exists:substitute_teachers,id',
            'school_teacher_id' => 'required|exists:school_teachers,id'
            //'special_requirements' => 'required',
        ]);

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $school = $schoolQuery->SchoolCollection();
        try {
            $request['school_id'] = $school[0]->id;
            $request['special_requirements'] = '';
            $new_subday = $handler->execute($request->all());
        } catch (\Exception $e) {
            return response(
                $e . ' Sorry, your reply could not be saved at this time.', 422
            );
        }

        //$url = 'view_subdays-' . $role;

        //dd($new_subday);
        $url = 'show_sub_day_request-' . $role;
        return redirect()->route($url, ['id' => $new_subday->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMail($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.mail_example_subday';
        $subday = SubDay::with(['substituteTeacher.myself', 'school', 'schoolTeacher.myself'])->where('id', $id)->firstOrFail();
        //dd($subday);
        return view($url, compact('user', 'subday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function accept()
    {
        //dd(request('token'));
        try {
            $subday = SubDay::where('sub_day_hash', request('token'))->firstOrFail();
        } catch (\Exception $e) {
            return response(
                'Sorry, something went wrong.', 422
            );
        }
        // If we reached this point, no errors, so we are good, change accepted to true
        $subday->accepted = true;
        $subday->save();

        $user = Auth::user();
        $role = $user->roles[0]->slug;

        $url = 'view_subdays-' . $role;

        return redirect()->route($url);
    }
}
