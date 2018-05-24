@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooladministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $teachers->school->name }} Administrator: {{ $user->name }}</h3>
        <h4>Principal: {{ $teachers->school->principal->myself->name }}</h4>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <h2>Teachers</h2>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_school_teachers-school_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create Teacher</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th>Grade</th>
                    <th>Class Room</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers->school->teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->myself->name }}</td>
                        <td>{{ $teacher->grade }}</td>
                        <td>{{ $teacher->classroom }}</td>
                        <td><a href="{{route('edit_school-school_administrator', ['id' => $teacher->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
