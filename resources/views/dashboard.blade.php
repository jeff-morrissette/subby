@extends('layouts.master')

@section('headercss')
<link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
            </ul>
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        @if ($user->inRole('super_administrator'))
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
        @endif
        <p>User Role:</p>
        <ul>
            @foreach ($user->roles as $role)
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
        @if ($user->inRole('school_teacher'))
            <h2>Teacher</h2>
            <p>{{ $user->name }}, id: {{ $user->teacher->id }}</p>
            
            <p>School Division: {{ $user->teacher->school->schooldivision->name }}</p>
            <p>School: {{ $user->teacher->school->name }}</p>
            <p>Classroom: {{ $user->teacher->classroom }}</p>
            <p><a href="#">create subday</a></p>
            <form role="form" method="POST" action="/substituteday/create">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputDatepicker">Pick day</label>
                    <div class="input-group input-daterange date" data-provide="datepicker">
                        <input type="text" class="form-control" name="absent_day_day_start">
                        <div class="input-group-addon">to</div>
                        <input type="text" class="form-control" name="absent_day_day_end">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="part_of_day" id="optionsRadios1" value="allday" checked>
                        All day
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="part_of_day" id="optionsRadios2" value="morning">
                        Morning
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="part_of_day" id="optionsRadios3" value="afternoon">
                        Afternoon
                    </label>
                </div>
                <p>list of substitutes available based on Teacher schooldivision and if they are available</p>
                @foreach ($user->teacher->school->schooldivision->substituteteachers as $substituteteacher)
                    <div class="radio">
                        <label>
                            <input type="radio" name="substitue_teacher_id" id="substitute-{{ $substituteteacher->myself->id }}" value="{{ $substituteteacher->myself->id }}">{{ $substituteteacher->myself->name }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <h3>Previous subDays</h3>
            <h3>Subdays coming up</h3>
        @endif
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
});</script>
@endsection