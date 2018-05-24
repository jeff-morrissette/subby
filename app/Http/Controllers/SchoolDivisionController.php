<?php

namespace App\Http\Controllers;

use auth;
use App\Province;
use App\Country;
use App\SchoolDivision;
use App\DBTransactions\StoreSchoolDivisionHandler;
use Illuminate\Http\Request;

class SchoolDivisionController extends Controller
{
    /**
     * SchoolDivisionController constructor.
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
        $uri = $request->path();
        $schooldivisions = SchoolDivision::all();

        return view('dashboard.super_administrator.school_divisions', compact('user', 'schooldivisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        return view('dashboard.super_administrator.school_divisions.create', compact('user', 'provinces', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreSchoolDivisionHandler $handler)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'country_id' => 'required|exists:countries,id',
            'postal_code' => 'required|string|max:255'
        ]);

        $schooldivision = new SchoolDivision;

        $handler->execute($schooldivision, $request->all());

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_school_divisions-' . $role;

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
        $schoolDivision = SchoolDivision::findOrFail($id);
        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        return view('dashboard.super_administrator.school_divisions.edit', compact('user', 'provinces', 'countries', 'schoolDivision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolDivision  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreSchoolDivisionHandler $handler, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'province_id' => 'required|exists:provinces,id',
                'country_id' => 'required|exists:countries,id',
                'postal_code' => 'required|string|max:255'
            ]);
            $schooldivision = SchoolDivision::findOrFail($id);

            $handler->execute($schooldivision, $request->all());

        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_school_divisions-' . $role;

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
