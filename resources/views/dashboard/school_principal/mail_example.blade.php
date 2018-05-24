@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolprincipal')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>Principal: {{ $user->name }}</h3>
        <p>This is an example of the email that was sent to the user:</p>
        <div class="well well-lg">
            <h2>Welcome to Subby</h2>
            <p>You have been assigned a temporary access token:</p>
            <p><strong>{{ $registered_user->access_token }}</strong></p>
            <p>Please follow the link below, where you will be asked to enter the above password and change to password of your choosing.</p>
            <p><a href="/register/confirm?token={{$registered_user->confirmation_token}}" class="btn btn-primary btn-lg active" role="button">Change your password</a></p>
        </div>
        <p><a href="{{route('school_principal')}}">Continue with the normal flow</a></p>
    </div>
</div>
@endsection
