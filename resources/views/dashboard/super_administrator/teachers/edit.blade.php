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
        <h2 class="sub-header">Edit {{ $teacher->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('update_teachers-super_administrator', ['id' => $teacher->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('forms.teacher.form_teacher')

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>
@endsection
