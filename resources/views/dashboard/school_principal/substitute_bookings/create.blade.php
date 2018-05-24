@extends('./layouts.master')

@section('headercss')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolprincipal')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h3>{{ $teacher->school->name }} Principal: {{ $user->name }}</h3>
        <h2 class="sub-header">Book: {{ $subTeacher->myself->name }}</h2>
        <form role="form" method="POST" action="{{ URL::route('store-sub_day-school_principal') }}">
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
            @include('forms.form_sub_day', ['teachers' => $teacher->school->teachers])
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
    //$(this).datepicker();
});
$('.input-daterange #dayend').on('changeDate', function(e) {
        // `e` here contains the extra attributes
        console.log($('#daystart').val() + ' ' + e.format('yyyy-mm-dd'));
        /*$.ajax({
            type: "GET",
            url: '/substitutetask/' + $rememberid,
            data: {start: $('#daystart').val(), end: e.format('yyyy-mm-dd')}, //--> send id of checked checkbox on other page
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
                console.log(data.checkedvalue);
                $rememberparent.empty();
                if(data.checkedvalue > 0) {
                    $rememberparent.prepend("<input id=\"" + $rememberid + "\" class=\"completecheck\" type=\"checkbox\" name=\"test\" value=\"" + data.checkedvalue + "\" checked>");
                } else {
                    $rememberparent.prepend("<input id=\"" + $rememberid + "\" class=\"completecheck\" type=\"checkbox\" name=\"test\" value=\"" + data.checkedvalue + "\" >");
                };
            },
            error: function(jqXHR, textStatus) {
                console.log('something went wrong');
            },
            complete: function() {
                console.log('it completed');
            }
        });*/
    });

</script>
@endsection