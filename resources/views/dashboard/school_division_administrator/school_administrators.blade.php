@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schoolAdmins->schooldivision->name }} Administrator: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h2>School Administrators</h2>
            </div>
            <div class="col-sm-12 col-md-8">
                <a href="{{route('create_school_administrators-school_division_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create School Administrator</a>
            </div>
        </div>
        @foreach ($schoolAdmins->schooldivision->schools as $school)
            @if (count($school->administrators) > 0)
            <h4>{{ $school->name }}</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50%">Name</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($school->administrators as $administrator)
                        <tr>
                            <td>{{ $administrator->myself->name }}</td>
                            <td><a href="{{route('edit_school_administrator-school_division_administrator', ['administrator' => $administrator->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                            <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @endforeach
    </div>
</div>
@endsection
