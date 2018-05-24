@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooladministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schools[0]->name }} Administrator: {{ $user->name }}</h3>
        <h4>Principal: {{ $schools[0]->principal->myself->name }}</h4>
        <h2 class="sub-header">Create Teacher</h2>
        <form role="form" method="POST" action="{{ URL::route('create_school_teachers-school_administrator') }}">
            {{ csrf_field() }}
            @include('forms.teacher.form_teacher')

            <div class="well bg-info">
                <p>Please note: On submission, an email will be sent to user with an auto-generated password. They will be given 24 hours to login and change to a new password.</p>
            </div>

            <button type="submit" class="btn btn-default">Submit &amp; Email</button>
        </form>
    </div>
</div>
@endsection
