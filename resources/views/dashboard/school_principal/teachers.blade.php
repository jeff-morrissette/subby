@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolprincipal')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $teachers->school->name }} Principal: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <h3>Teachers</h3>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_school_teachers-school_principal')}}" class="btn btn-primary btn-equalize" role="button">Create Teachers</a>
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
                        <td><a href="{{route('edit_school_teachers-school_principal', ['id' => $teacher->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
