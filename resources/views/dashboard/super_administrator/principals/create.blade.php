@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.superadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>Super Administrator: {{ $user->name }}</h3>
        <h2 class="sub-header">Create School Principal</h2>
        <form role="form" method="POST" action="{{ URL::route('create_principals-super_administrator') }}">
            {{ csrf_field() }}
            @include('forms.principal.form_principal')

            <div class="well bg-info">
                <p>Please note: On submission, an email will be sent to user with an auto-generated password. They will be given 24 hours to login and change to a new password.</p>
            </div>

            <button type="submit" class="btn btn-default">Submit &amp; Email</button>
        </form>
    </div>
</div>
@endsection
