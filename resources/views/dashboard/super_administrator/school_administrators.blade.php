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
            <div class="col-sm-12 col-md-4">
                <h2>School Administrators</h2>
            </div>
            <div class="col-sm-12 col-md-8">
                <a href="{{route('create_school_administrators-super_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create School Administrator</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>School</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schoolAdmins as $schoolAdministrator)
                    <tr>
                        <td>{{ $schoolAdministrator->myself->name }}</td>
                        <td>{{ $schoolAdministrator->school->name }}</td>
                        <td><a href="{{route('edit_school_administrator-super_administrator', ['administrator' => $schoolAdministrator->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
