<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\School;
use App\SubDay;
use App\Subtask;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    /**
     * SubtaskController constructor.
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $subdayhash = ($request->subday);
        //dd($subdayhash);
        $subday = SubDay::where('sub_day_hash', $subdayhash)->firstOrFail();
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.subdays.task.create';
        return view($url, compact('user', 'subdayhash', 'subday'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $subdays = $user->teacher->subdays;

        $role = $user->roles[0]->slug;
        $url = 'show_substitute_day_task-' . $role;

        return redirect()->route($url, ['id' => $subdayhash]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subday = SubDay::where('sub_day_hash', $id)->firstOrFail();
        $subday->load('school', 'schoolTeacher.myself', 'substituteTeacher.myself', 'tasks');
        //dd($subday);
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.subdays.showtask.show';
        return view($url, compact('user', 'subday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
