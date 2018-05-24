@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooladministrator');
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $subday->school->name }} Administrator: {{ $user->name }}</h3>
        <h4>Principal: {{ $subday->school->principal->myself->name }}</h4>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
