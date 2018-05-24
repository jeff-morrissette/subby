<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($schoolAdministrator->myself->name) ? $schoolAdministrator->myself->name : null) }}" required>
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">E-Mail Address</label>
    <input class="form-control" id="email" type="email" name="email" value="{{ old('email', isset($schoolAdministrator->myself->email) ? $schoolAdministrator->myself->email : null) }}" required>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<div class="form-group">
    <label for="school_id">Schools</label>
    <select name="school_id" class="form-control">
        @foreach($schools as $school)
            <option value="{{ $school->id }}" {{ (old("school_id", isset($schoolAdministrator->school_id) ? $schoolAdministrator->school_id : null) == $school->id ? "selected" : "") }}>{{ $school->name }}</option>
        @endforeach
    </select>
</div>