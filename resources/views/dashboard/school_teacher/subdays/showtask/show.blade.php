@extends('./layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('nav.schoolteacher')
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>
        <h2>{{ $subday->school->name }} Teacher: {{ $user->name }}</h2>
        <h3>Substitute Teacher: {{ $subday->substituteTeacher->myself->name }}</h3>
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
                        @if ( $task->completed > 0 )
                            <td>Completed</td>
                        @else
                            <td>Not Completed</td>
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