@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolprincipal')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $substituteteacher->school->name }} Principal: {{ $user->name }}</h3>
        <h3>Substitute Teachers</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($substituteteacher->school->schooldivision->substituteteachers as $subteacher)
                    <tr>
                        <td>{{ $subteacher->myself->name }}</td>
                        <td>
                            <a href="{{route('create-sub_day-school_principal', ['id' => $subteacher->id])}}" class="btn btn-warning btn-sm" role="button">
                                Book
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
