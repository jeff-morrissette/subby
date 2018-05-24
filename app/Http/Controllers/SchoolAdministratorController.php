<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\SchoolAdministrator;
use App\DBTransactions\StoreSchoolAdministratorHandler;
use App\DBTransactions\UpdateSchoolAdministratorHandler;
use App\QueryCollections\School\SchoolQuery;
use App\QueryCollections\SchoolAdministrator\SchoolAdminQuery;
use Illuminate\Http\Request;

class SchoolAdministratorController extends Controller
{
    /**
     * SchoolAdministratorController constructor.
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
        if ($role != 'school_administrator') {
            $url = $url . '.school_administrators';
        }

        $schoolAdminQuery = new SchoolAdminQuery;
        $schoolAdminQuery->setType($role);
        $schoolAdmins = $schoolAdminQuery->SchoolAdminCollection();
        //dd($schoolAdmins);
        return view($url, compact('user', 'schoolAdmins'));
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
        $url = 'dashboard.' . $role . '.school_administrators.create';
        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();
        //dd($schools);
        return view($url, compact('user', 'schools'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSchoolAdministratorHandler $handler)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'school_id' => 'required|exists:schools,id'
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolAdministrator  $schoolAdministrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.school_administrators.edit';
        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();
        $schoolAdministrator = SchoolAdministrator::with(['myself', 'school'])->findOrFail($id);

        return view($url, compact('user', 'schools', 'schoolAdministrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolAdministrator  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateSchoolAdministratorHandler $handler, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'school_id' => 'required|exists:schools,id'
        ]);
        try {
            $schoolAdministrator = SchoolAdministrator::findOrFail($id);
            $handler->execute($schoolAdministrator, $request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_school_administrators-' . $role;

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
