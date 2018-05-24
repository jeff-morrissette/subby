@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $principals->schooldivision->name }} Administrator: {{ $user->name }}</h3>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <h2>Principals</h2>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_principals-school_division_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create Principal</a>
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
                @foreach ($principals->schooldivision->schools as $school)
                    @if (isset($school->principal))
                        <tr>
                            <td>{{ $school->principal->myself->name }}</td>
                            <td>{{ $school->name }}</td>
                            <td><a href="{{route('edit_principals-school_division_administrator', ['principal' => $school->principal->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                            <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                        </tr>
                    @else 
                        <tr class="danger">
                            <td>&nbsp;</td>
                            <td>{{ $school->name }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
