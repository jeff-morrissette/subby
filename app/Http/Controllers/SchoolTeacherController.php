<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\SubDay;
use App\Subtask;
use App\SchoolTeacher;
use App\SubstituteTeacher;
use App\DBTransactions\StoreSubDayHandler;
use App\DBTransactions\StoreTeacherHandler;
use App\DBTransactions\UpdateTeacherHandler;
use App\QueryCollections\School\SchoolQuery;
use App\QueryCollections\SchoolTeacher\SchoolTeacherQuery;
use Illuminate\Http\Request;

class SchoolTeacherController extends Controller
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
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role;
        if ($role != 'school_teacher') {
            $url = $url . '.teachers';
        }
        //dd($url);
        $schoolTeacherQuery = new SchoolTeacherQuery;
        $schoolTeacherQuery->setType($role);
        $teachers = $schoolTeacherQuery->SchoolTeacherCollection();

        return view($url, compact('user', 'teachers'));
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
        $url = 'dashboard.' . $role . '.teachers.create';

        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();

        return view($url, compact('user', 'schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreTeacherHandler $handler)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'school_id' => 'required|exists:schools,id',
            'classroom' => 'required|string|max:255',
            'grade' => 'required',
            'parking_stall' => 'string|max:255',
        ]);

        
        try {
            $new_user = $handler->execute($request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'show_register_user-' . $role;

        return redirect()->route($url, ['id' => $new_user->id]);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.teachers.edit';

        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();
        $teacher = SchoolTeacher::with('myself')->findOrFail($id);
        //dd($schools);

        return view($url, compact('user', 'schools', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateTeacherHandler $handler, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'school_id' => 'required',
            'grade' => 'required',
            'classroom' => 'required',
            'parking_stall' => 'required'
        ]);
        try {
            $teacher = SchoolTeacher::findOrFail($id);
            $handler->execute($teacher, $request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_teachers-' . $role;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTask(Request $request)
    {
        $subdayhash = ($request->subday);
        $subday = SubDay::where('sub_day_hash', $subdayhash)->firstOrFail();
        $user = Auth::user();
        $teacher = SchoolTeacher::with('school')->where('user_id', $user->id)->first();
        return view(
            'dashboard.school_teacher.subdays.task.create',
            compact('user', 'teacher', 'subdayhash')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTask(Request $request)
    {
        $this->validate($request, [
                'details.*' => 'required|max:255',
            ]);
        $subdayhash = ($request->subday);
        $subday = SubDay::where('sub_day_hash', $subdayhash)->firstOrFail();
        $user = Auth::user();
        $user->load(['teacher.subdays' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
        foreach ($request->details as $detail) {
            $sub_task = new Subtask;
            $sub_task->sub_day_id = $subday->id;
            $sub_task->description = $detail;
            $sub_task->save();
        }
        $teacher = SchoolTeacher::with(['school.teachers.myself', 'school.schooldivision.substituteteachers.myself', 'school.subday' => function ($query) {
                    $query->orderBy('absent_day_day_start', 'desc');
                }, 'school.subday.schoolTeacher', 'school.subday.substituteTeacher', 'school.subday.tasks'])->where('user_id', $user->id)->first();

        return view('dashboard.school_teacher.subdays', compact('user', 'teacher'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTask($id)
    {
        $user = Auth::user();
        $subday = SubDay::where('sub_day_hash', $id)->firstOrFail();
        $subday->load('substituteTeacher.myself', 'tasks');
        $teacher = SchoolTeacher::with('school.teachers.myself')->where('user_id', $user->id)->first();
        //dd($subday);
        
        return view('dashboard.school_teacher.subdays.showtask.show', compact('user', 'teacher', 'subday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTask(Request $request, $id)
    {
        //dd($request->complete);
        $subtask = Subtask::where('id', $id)->firstOrFail();
        if ($request->complete > 0) {
            $subtask->completed = false;
            $returnvalue=0;
        } else {
            $subtask->completed = true;
            $returnvalue=1;
        }
        $subtask->save();

        return response()->json([
            'status' => 'success',
            'checkedvalue' => $returnvalue,
        ]);
    }
}
