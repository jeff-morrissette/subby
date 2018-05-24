@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h2>{{ $subday->school->name }} Teacher: {{ $user->name }}</h2>
        <h3>Bookings</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Part of day</th>
                    <th>Teacher</th>
                    <th>Substitute Teacher</th>
                    <th>Classroom</th>
                    <th>Accepted</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subday->school->subday as $subday)
                    @if ( Carbon\Carbon::now() > $subday->absent_day_day_end )
                        <tr class="danger">
                    @else
                        <tr>
                    @endif
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
                        @if ( $subday->accepted == 1)
                            <td class="success">Accepted</td>
                        @elseif ( $subday->accepted == 2 )
                            <td class="danger">Declined</td>
                        @else
                            <td class="warning">Pending</td>
                        @endif
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" role="button">
                                Edit
                            </a>
                        </td>

                        @if ( count($subday->tasks) >= 1 )
                            <td><a href="{{ URL::route('show_substitute_day_task-school_teacher', ['subday' => $subday->sub_day_hash]) }}">View task</a></td>
                        @else
                            <td><a class="btn btn-default" href="{{ URL::route('create_substitute_day_task-school_teacher', ['subday' => $subday->sub_day_hash]) }}" role="button">Create task</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
