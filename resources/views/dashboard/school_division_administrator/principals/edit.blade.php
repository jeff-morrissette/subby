@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schooldivisionadministrator');
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $schools->schooldivision->name }} Administrator: {{ $user->name }}</h3>
        <h2 class="sub-header">Edit {{ $principal->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('update_principals-school_division_administrator', ['id' => $principal->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('forms.principal.form_principal', ['schools' => $schools->schooldivision->schools])

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
@endsection
