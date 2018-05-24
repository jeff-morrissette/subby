<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Principal;
use App\DBTransactions\StorePrincipalHandler;
use App\DBTransactions\UpdatePrincipalHandler;
use App\QueryCollections\School\SchoolQuery;
use App\QueryCollections\Principal\PrincipalQuery;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    /**
     * PrincipalController constructor.
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
        if ($role != 'school_principal') {
            $url = $url . '.principals';
        }

        $principalquery = new PrincipalQuery;
        $principalquery->setType($role);
        $principals = $principalquery->PrincipalCollection();

        return view($url, compact('user', 'principals'));
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
        $url = 'dashboard.' . $role . '.principals.create';
        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();
        //dd($subday);
        return view($url, compact('user', 'schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StorePrincipalHandler $handler)
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
        $url = 'dashboard.' . $role . '.principals.edit';
        $schoolQuery = new SchoolQuery;
        $schoolQuery->setType($role);
        $schools = $schoolQuery->SchoolCollection();
        $principal = Principal::findOrFail($id);

        return view($url, compact('user', 'schools', 'principal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Principal  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdatePrincipalHandler $handler, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'school_id' => 'required|exists:schools,id'
        ]);

        try {
            $principal = Principal::findOrFail($id);
            $handler->execute($principal, $request->all());
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }
        
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'view_principals-' . $role;

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
