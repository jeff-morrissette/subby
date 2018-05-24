@extends('./layouts.master')

@section('headercss')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.substituteteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Create vacation day</h1>
        <form role="form" method="POST" action="{{route('store_vacationdays-substitute_teacher')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputDatepicker">Pick day</label>
                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <input type="text" class="form-control" name="vacation_day">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <table class="table">
            <tr>
                <th>Vacation days already chosen</th>
            </tr>
            @if ( count($subvacationday->vacationdays) == 0 )
                <tr><td>No Vacation days have been taken</td></tr>
            @else
                @foreach ($subvacationday->vacationdays as $vacationday)
                    <tr><td>{{ Carbon\Carbon::parse($vacationday->vacation_day)->toFormattedDateString() }}</td></tr>
                @endforeach
            @endif
            
        </table>
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker();
</script>
@endsection