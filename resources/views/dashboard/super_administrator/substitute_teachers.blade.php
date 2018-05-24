@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.superadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>Super Administrator: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <h2>Substitute Teachers</h2>
            </div>
            <div class="col-sm-12 col-md-9">
                <a href="{{route('create_substitute_teachers-super_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create Substitute Teacher</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>School Divisions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($substituteteacher as $substituteTeacher)
                    <tr>
                        <td>{{ $substituteTeacher->myself->name }}</td>
                        <td><a href="{{route('edit_substitute_teacher-super_administrator', ['substitute' => $substituteTeacher->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                        @if (isset($substituteTeacher->schooldivisions[0]))
                            <td>
                                <table width="100%">
                                    @foreach ($substituteTeacher->schooldivisions as $schooldivision)
                                        <tr>
                                            <td>{{ $schooldivision->name }}</td>
                                            <td><a href="#" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                                            <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        @else
                            <td><a href="#" class="btn btn-primary btn-sm" role="button">Assign School Division</a></td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
