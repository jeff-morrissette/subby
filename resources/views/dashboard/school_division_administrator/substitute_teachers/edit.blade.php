@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schoolDivision[0]->name }} Administrator: {{ $user->name }}</h3>
        <h2 class="sub-header">Edit {{ $substituteTeacher->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('update_substitute_teacher-school_division_administrator', ['id' => $substituteTeacher->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('forms.substitute_teacher.form_substitute_teacher')

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
@endsection
