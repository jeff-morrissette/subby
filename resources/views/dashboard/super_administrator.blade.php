@extends('layouts.master')

@section('headercss')
<link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.superadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>Super Administrator: {{ $user->name }}</h3>

            <h2 class="sub-header">Roles</h2>
            <ul>
                @foreach ($roles as $role)
                    <li>{{ $role->name }}
                        <ul>
                        @foreach ($role->permissions as $permission)
                            <li>{{ $permission->name }}, {{ $permission->id }}</li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        
            <h2 class="sub-header">School Divisions</h2>
            <ul>
            @foreach ($schooldivisions as $schooldivision)
                <li>{{ $schooldivision->name }}
                    <ul>
                    @foreach ($schooldivision->schools as $school)
                        <li>{{ $school->name }}</li>
                    @endforeach
                    </ul>
                </li>
            @endforeach
            </ul>
        <p>User Role:</p>
        <ul>
            @foreach ($user->roles as $role)
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
        
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
});</script>
@endsection