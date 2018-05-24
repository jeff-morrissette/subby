@extends('./layouts.master')

@section('headercss')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
            </ul>
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Create sub day</h1>
        <form role="form" method="POST" action="/substituteday/create">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputDatepicker">Pick day</label>
                <div class="input-group input-daterange date" data-provide="datepicker" id="datepicker" data-date-format="yyyy-mm-dd">
                    <input id="daystart" type="text" class="form-control" name="start">
                    <div class="input-group-addon">to</div>
                    <input id="dayend" type="text" class="form-control" name="end">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="part_of_day" id="optionsRadios1" value="allday" checked>
                    All day
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="part_of_day" id="optionsRadios2" value="morning">
                    Morning
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="part_of_day" id="optionsRadios3" value="afternoon">
                    Afternoon
                </label>
            </div>
            <p>list of substitutes available based on Teacher schooldivision and if they are available</p>
            @foreach ($user->teacher->school->schooldivision->substituteteachers as $substituteteacher)
                <div class="radio">
                    <label>
                        <input type="radio" name="substitue_teacher_id" id="substitute-{{ $substituteteacher->myself->id }}" value="{{ $substituteteacher->myself->id }}">{{ $substituteteacher->myself->name }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('footerscript')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates', {format:'yyyy-mm-dd'});
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