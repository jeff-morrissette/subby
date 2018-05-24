@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schoolDivisions[0]->name }} Administrator: {{ $user->name }}</h3>

        <h3>Update School</h3>

        <form role="form" method="POST" action="{{ URL::route('update_school-school_division_administrator', ['id' => $school->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('forms.school.form_school')

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
