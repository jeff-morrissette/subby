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
        <h3>Create Task</h3>
        @if ($errors->any())

		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <form role="form" method="POST" action="{{ URL::route('store_substitute_day_task-school_teacher') }}">
            {{ csrf_field() }}
            <input type="hidden" name="subday" value="{{ $subdayhash }}" />
            <div class="form-group @if ($errors->has('details.1')) has-error @endif" id="task1">
                <label for="details">Task</label>
                <textarea class="form-control" id="details1" name="details[1]" rows="3">{{ old('details.1') }}</textarea>
                @if ($errors->has('details.1')) <p class="help-block">{{ $errors->first('details.1') }}</p> @endif
            </div>
            @if (count(old('details')) > 1)
            	@for ($i = 2; $i <= count(old('details')); $i++)
					<div class="form-group @if ($errors->has('details.' . $i)) has-error @endif" id="task{{ $i }}">
        				<label for="details">Task</label>
        				<textarea class="form-control" id="details{{ $i }}" name="details[{{ $i }}]" rows="3">{{ old('details.' . $i) }}</textarea>
        				@if ($errors->has('details.' . $i)) <p class="help-block">{{ $errors->first('details.' . $i) }}</p> @endif
        			</div>
				@endfor
            @endif
            <button type="submit" class="btn btn-default btn-xs add-more">Add another task</button>
            <hr />
            
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('footerscript')
<script type="text/javascript">
$(document).ready(function(){
    var next = document.querySelectorAll('.form-group').length;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#task" + next;
        var addRemove = "#task" + (next);
        next = next + 1;
        var newIn = '<div class="form-group  @if ($errors->has("details.[' + next + ']")) has-error @endif" id="task' + next +'"><label for="details">Task</label><textarea class="form-control" id="details' + next +'" name="details[' + next + ']" rows="3"></textarea>@if ($errors->has("details.[' + next + ']")) <p class="help-block">{{ $errors->first("details.[' + next + ']") }}</p> @endif</div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#details" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#task" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    }); 
});
</script>
@endsection