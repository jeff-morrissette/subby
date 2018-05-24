@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.substituteteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h2>Substitute Teacher: {{ $user->name }}</h2>
        <h3>Bookings</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>School</th>
                    <th>Teacher</th>
                    <th>Grade</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Tasks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subday->dayofsubstitution as $subday)
                    @if ( Carbon\Carbon::now() > $subday->absent_day_day_end )
                        <tr class="danger">
                    @else
                        <tr>
                    @endif
                        <td>{{ $subday->school->name }}</td>
                        <td>{{ $subday->schoolTeacher->myself->name }}</td>
                        <td>{{ $subday->schoolTeacher->grade }}</td>
                        <td>{{ Carbon\Carbon::parse($subday->absent_day_day_start)->toFormattedDateString() }}</td>
                        <td>{{ Carbon\Carbon::parse($subday->absent_day_day_end)->toFormattedDateString() }}</td>
                        <td>{{ $subday->part_of_day }}</td>
                        @if ( count($subday->tasks) >= 1 )
                            <td><a href="{{ URL::route('show_substitute_day_task-substitute_teacher', ['subday' => $subday->sub_day_hash]) }}">View task</a></td>
                        @else
                            <td>Task not created</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
