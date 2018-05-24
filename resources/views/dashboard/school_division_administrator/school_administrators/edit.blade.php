@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schools->SchoolDivision->name }} Administrator: {{ $user->name }}</h3>
        <h2>Edit {{ $schoolAdministrator->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('update_school_administrator-school_division_administrator', ['id' => $schoolAdministrator->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('forms.school_administrator.form_school_administrator', ['schools' => $schools->schooldivision->schools])

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
@endsection
