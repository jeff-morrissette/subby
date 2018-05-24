@extends('./layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.substituteteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h2>Substitute Teacher: {{ $user->name }}</h2>
        <h3>Substitute Days</h3>
        <p>Add Analytics</p>
    </div>
</div>
@endsection