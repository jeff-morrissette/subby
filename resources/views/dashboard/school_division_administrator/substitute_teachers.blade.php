@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator');
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $substituteteacher->SchoolDivision->name }} Administrator: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <h2>Substitute Teachers</h2>
            </div>
            <div class="col-sm-12 col-md-9">
                <a href="{{route('create_substitute_teachers-school_division_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create Substitute Teacher</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>   
                @foreach ($substituteteacher->schooldivision->substituteteachers as $substituteteacher)
                    <tr>
                        <td>{{ $substituteteacher->myself->name }}</td>
                        <td><a href="{{route('edit_substitute_teacher-school_division_administrator', ['substituteteacher' => $substituteteacher->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
