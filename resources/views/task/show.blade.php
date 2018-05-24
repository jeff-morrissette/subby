@extends('./layouts.master')

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
        <h1 class="page-header">View Task</h1>
        <h2>Teacher</h2>
        <p>{{ $user->name }}</p>
        <h2>Substitute Teacher</h2>
        <p>{{ $subday->substituteTeacher->myself->name }}</p>
        <h3>Task Items</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Completion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subday->tasks as $task)
                    <tr>
                        <td>{{ $task->description }}</td>
                        @if ($user->inRole('substitute_teacher'))
                            <td class="colcheck"><input id="{{ $task->id }}" class="completecheck" type="checkbox" name="complete" value="{{ $task->completed }}" @if ($task->completed > 0) checked @endif></td>
                        @else
                            @if ( $task->completed > 0 )
                                <td>Completed</td>
                            @else
                                <td>Not Completed</td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footerscript')
<script type="text/javascript">
$(document).ready(function(){
    $('td.colcheck').on('click', '.completecheck', function() {
            $rememberid = $(this).attr('id');
            $rememberparent = $(this).parent();
            $rememberparent.empty();
            $rememberparent.prepend("<span class=\"checkboxspinner\"></span>");
            $.ajax({
                type: "PATCH",
                url: '/substitutetask/' + $rememberid,
                data: {complete: $(this).attr('value')}, //--> send id of checked checkbox on other page
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
            });
    });
});
</script>
@endsection