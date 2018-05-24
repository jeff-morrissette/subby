<input type="hidden" id="substitute_teacher_id" name="substitute_teacher_id" value="{{ $subTeacher->id }}">

<div class="radio">
    <label>
        <input type="radio" name="part_of_day" id="optionsRadios1" value="All day" checked>
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
<div class="form-group">
    <label for="school_teacher_id">Teachers</label>
    <select name="school_teacher_id" class="form-control">
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ (old("school_teacher_id", isset($subDay->school_teacher_id) ? $subDay->school_teacher_id : null) == $teacher->id ? "selected" : "") }}>{{ $teacher->myself->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="inputDatepicker">Pick day</label>
    <div class="input-group input-daterange date" data-provide="datepicker" id="datepicker" data-date-format="yyyy-mm-dd">
        <input id="daystart" type="text" class="form-control" name="absent_day_day_start">
        <div class="input-group-addon">to</div>
        <input id="dayend" type="text" class="form-control" name="absent_day_day_end">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
</div>