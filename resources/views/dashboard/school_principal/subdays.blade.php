@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolprincipal');
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $subday->school->name }} Principal: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <h3>Bookings</h3>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_school_teachers-school_principal')}}" class="btn btn-primary" role="button">Create</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Part of day</th>
                    <th>Teacher</th>
                    <th>Substitute Teacher</th>
                    <th>Classroom</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subday->school->subday as $subday)
                    <tr>
                        <td>
                            {{ Carbon\Carbon::parse($subday->absent_day_day_start)->toFormattedDateString() }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($subday->absent_day_day_end)->toFormattedDateString() }}
                        </td>
                        <td>
                            {{ $subday->part_of_day }}
                        </td>
                        <td>
                            {{ $subday->schoolTeacher->myself->name }}
                        </td>
                        <td>
                            {{ $subday->substituteTeacher->myself->name }}
                        </td>
                        <td>
                            {{ $subday->schoolTeacher->classroom }}
                        </td>
                        @if ( count($subday->tasks) >= 1 )
                            <td><a href="{{ URL::route('show_substitute_day_task-school_principal', ['subday' => $subday->sub_day_hash]) }}">View task</a></td>
                        @else
                            <td>No Tasks created</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
