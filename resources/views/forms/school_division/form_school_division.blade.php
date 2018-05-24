<div class="form-group @if ($errors->has('name')) has-error @endif">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($schoolDivision->name) ? $schoolDivision->name : null) }}">
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('address')) has-error @endif">
    <label for="address">Address</label>
    <input class="form-control" id="address" name="address" value="{{ old('address', isset($schoolDivision->address) ? $schoolDivision->address : null) }}">
    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('city')) has-error @endif">
    <label for="city">City</label>
    <input class="form-control" id="city" name="city" value="{{ old('city', isset($schoolDivision->city) ? $schoolDivision->city : null) }}">
    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
</div>

<div class="form-group">
    <label for="province_id">Province</label>
    <select name="province_id" class="form-control">
        @foreach($provinces as $province)
            <option value="{{ $province->id }}" {{ (old("province_id", isset($schoolDivision->province_id) ? $schoolDivision->province_id : null) == $province->id ? "selected" : "") }}>{{ $province->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="country_id">Country</label>
    <select name="country_id" class="form-control">
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ (old("country_id", isset($schoolDivision->country_id) ? $schoolDivision->country_id : null) == $country->id ? "selected" : "") }}>{{ $country->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group @if ($errors->has('postal_code')) has-error @endif">
    <label for="postal_code">Postal Code</label>
    <input class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', isset($schoolDivision->postal_code) ? $schoolDivision->postal_code : null) }}">
    @if ($errors->has('postal_code')) <p class="help-block">{{ $errors->first('postal_code') }}</p> @endif
</div>