@extends('./layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $teachers[0]->school->name }} Teacher: {{ $user->name }}</h3>
        <p>Classroom: {{ $teachers[0]->classroom }}</p>
    </div>
</div>
@endsection