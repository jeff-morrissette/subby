<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($schoolDivisionAdministrator->myself->name) ? $schoolDivisionAdministrator->myself->name : null) }}" required>
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">E-Mail Address</label>
    <input class="form-control" id="email" type="email" name="email" value="{{ old('email', isset($schoolDivisionAdministrator->myself->email) ? $schoolDivisionAdministrator->myself->email : null) }}" required>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<div class="form-group">
    <label for="school_division_id">School Divisions</label>
    <select name="school_division_id" class="form-control">
        @foreach($schoolDivisions as $schoolDivision)
            <option value="{{ $schoolDivision->id }}" {{ (old("school_division_id", isset($schoolDivisionAdministrator->school_division_id) ? $schoolDivisionAdministrator->school_division_id : null) == $schoolDivision->id ? "selected" : "") }}>{{ $schoolDivision->name }}</option>
        @endforeach
    </select>
</div>