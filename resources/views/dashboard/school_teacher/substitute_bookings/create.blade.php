@extends('./layouts.master')

@section('headercss')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
<style type="text/css">
    .datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {
        color: red;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $teacher[0]->school->name }} Teacher: {{ $user->name }}</h3>
        <h2 class="sub-header">Book: {{ $subTeacher->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('store-sub_day-school_teacher') }}">
            {{ csrf_field() }}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('forms.form_sub_day', ['teachers' => $teacher])
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
var daysBooked = <?php echo json_encode($bookedDayArray) ?>;
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
//$.fn.datepicker.defaults.datesDisabled = ['2018-03-06', '2018-03-21'];
$.fn.datepicker.defaults.datesDisabled = daysBooked;
$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
    //$(this).datepicker();
});
$('.input-daterange #dayend').on('changeDate', function(e) {
        // `e` here contains the extra attributes
        console.log($('#daystart').val() + ' ' + e.format('yyyy-mm-dd'));
    });

</script>
@endsection