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
            <div class="col-sm-12 col-md-2">
                <h2>School Divisions</h2>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_school_division-super_administrator')}}" class="btn btn-primary btn-equalize" role="button">Create School Division</a>
            </div>
        </div>
        <table class="table">
        @foreach ($schooldivisions as $schooldivision)
            <tr>
                <td>{{ $schooldivision->name }}</td>
                <td><a href="{{route('edit_school_division-super_administrator', ['id' => $schooldivision->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a></td>
                <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
            </tr>
        @endforeach
        </table>
        
    </div>
</div>
@endsection
