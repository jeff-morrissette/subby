<?php

namespace App\Http\Controllers;

use auth;
use App\Country;
use App\Province;
use App\SchoolDivision;
use App\SchoolDivisionAdministrator;
use App\DBTransactions\StoreSchoolDivisionAdministratorHandler;
use App\DBTransactions\UpdateSchoolDivisionAdministratorHandler;
use App\QueryCollections\SchoolDivisionAdministrator\SchoolDivisionAdminQuery;
use Illuminate\Http\Request;

class SchoolDivisionAdministratorController extends Controller
{
    /**
     * SchoolDivisionAdministratorController constructor.
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
        if ($role != 'school_division_administrator') {
            $url = $url . '.school_division_administrators';
        }
        //dd($url);
        $schoolDivisionAdminQuery = new SchoolDivisionAdminQuery;
        $schoolDivisionAdminQuery->setType($role);
        $schoolDivisionAdmins = $schoolDivisionAdminQuery->SchoolDivisionAdminCollection();
        //dd($subday);
        return view($url, compact('user', 'schoolDivisionAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $schoolDivisions = SchoolDivision::orderBy('name', 'asc')->get();
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        return view('dashboard.super_administrator.school_division_administrators.create', compact('user', 'schoolDivisions', 'provinces', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSchoolDivisionAdministratorHandler $handler)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'school_division_id' => 'required|exists:school_divisions,id'
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
        //$url = 'view_school_division_administrator-' . $role;
        $url = 'show_register_user-' . $role;

        return redirect()->route($url, ['id' => $new_user->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolDivisionAdministrator  $schoolDivisionAdministrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.school_division_administrators.edit';
        if ($role == 'school_division_administrator') {
            $url = 'dashboard.' . $role . '.edit';
        }

        $schoolDivisions = SchoolDivision::orderBy('name', 'asc')->get();
        $schoolDivisionAdministrator = SchoolDivisionAdministrator::with(['myself', 'schooldivision'])->findOrFail($id);

        return view($url, compact('user', 'schoolDivisions', 'schoolDivisionAdministrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolDivisionAdministrator  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateSchoolDivisionAdministratorHandler $handler, $id)
    {
        $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'schooldivision_id' => 'required|exists:school_divisions,id'
            ]);
        
        try {
            $schoolDivisionAdministrator = SchoolDivisionAdministrator::findOrFail($id);
            $handler->execute($schoolDivisionAdministrator, $request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_school_division_administrator-' . $role;

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
