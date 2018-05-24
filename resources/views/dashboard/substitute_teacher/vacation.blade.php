@extends('./layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.substituteteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h2>Substitute Teacher</h2>
        <p>{{ $user->name }}</p>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <h3>Vacation Days</h3>
            </div>
            <div class="col-sm-12 col-md-10">
                <a href="{{route('create_vacationdays-substitute_teacher')}}" class="btn btn-primary  btn-equalize" role="button">Create</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @if ( count($subvacationday->vacationdays) == 0 )
                    <tr><td>No Vacation days have been taken</td></tr>
                @else
                    @foreach ($subvacationday->vacationdays as $vacationday)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($vacationday->vacation_day)->toFormattedDateString() }}</td>
                            <td><a href="#" class="btn btn-danger btn-sm" role="button">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection