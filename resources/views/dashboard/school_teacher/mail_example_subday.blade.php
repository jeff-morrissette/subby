@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $subday->school->name }} Teacher: {{ $user->name }}</h3>
        <p>This is an example of the email that was sent to the user:</p>
        <div class="well well-lg">
            <h2>Hello {{ $subday->substituteTeacher->myself->name }},</h2>
            <p>{{ $subday->schoolTeacher->myself->name }} from {{ $subday->school->name }} has requested you watch over their {{ $subday->schoolTeacher->grade }} grade classroom.</p>
            <p>Please follow the link below, this will accept the request.</p>
            <p><a href="/dashboard/substitute_teacher/subdays/confirm?token={{$subday->sub_day_hash}}" class="btn btn-primary btn-lg active" role="button">Accept</a></p>
        </div>
        <p><a href="{{route('view_subdays-school_teacher')}}">Continue with the normal flow</a></p>
    </div>
</div>
@endsection
