<?php

namespace App\Http\Controllers\Auth;

use auth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class RegisterConfirmationController extends Controller
{
	//use RedirectsUsers;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	//dd('Inside Register Confirmation Controller show');
        $user = Auth::user();
        $role = $user->roles[0]->slug;
        $url = 'dashboard.' . $role . '.mail_example';
        $registered_user = User::where('id', $id)->firstOrFail();
        //dd($url);
        return view($url, compact('user', 'registered_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    	//dd(request('token'));
    	try {
    		$user = User::where('confirmation_token', request('token'))->select('id', 'email', 'confirmation_token', 'confirmed')->firstOrFail();
    	} catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }
        if ($user->confirmed == true)
        	return redirect('/login');

        return view('auth.passwords.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolAdministrator  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        	'confirmation_token' => 'required',
            'access_token' => 'required|max:4|exists:users,access_token',
            'password' => 'required|confirmed|min:6',
        ]);
        try {
            $updateUser = User::findorFail($id);
        	$updateUser->password = bcrypt($request['password']);
        	$updateUser->confirmed = true;
            $updateUser->remember_token = Str::random(60);
        	$updateUser->save();
        } catch (\Exception $e) {
            return response(
                'Sorry, your reply could not be saved at this time.', 422
            );
        }

        $this->guard()->login($updateUser);
        $user = Auth::user();
        $role = $user->roles[0]->slug;

        return redirect()->route($role);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
