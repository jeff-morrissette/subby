<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($teacher->myself->name) ? $teacher->myself->name : null) }}" required>
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">E-Mail Address</label>
    <input class="form-control" id="email" type="email" name="email" value="{{ old('email', isset($teacher->myself->email) ? $teacher->myself->email : null) }}" required>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<div class="form-group">
    <label for="school_id">Schools</label>
    <select name="school_id" class="form-control">
        @foreach($schools as $school)
            <option value="{{ $school->id }}" {{ (old("school_id", isset($teacher->school_id) ? $teacher->school_id : null) == $school->id ? "selected" : "") }}>{{ $school->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
    <label for="grade">Grade</label>
    <input class="form-control" id="grade" name="grade" value="{{ old('grade', isset($teacher->grade) ? $teacher->grade : null) }}" required>
    @if ($errors->has('grade')) <p class="help-block">{{ $errors->first('grade') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('classroom') ? ' has-error' : '' }}">
    <label for="classroom">Classroom</label>
    <input class="form-control" id="classroom" name="classroom" value="{{ old('classroom', isset($teacher->classroom) ? $teacher->classroom : null) }}" required>
    @if ($errors->has('classroom')) <p class="help-block">{{ $errors->first('classroom') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('parking_stall') ? ' has-error' : '' }}">
    <label for="parking_stall">Parking Stall</label>
    <input class="form-control" id="parking_stall" name="parking_stall" value="{{ old('parking_stall', isset($teacher->parking_stall) ? $teacher->parking_stall : null) }}" required>
    @if ($errors->has('parking_stall')) <p class="help-block">{{ $errors->first('parking_stall') }}</p> @endif
</div>