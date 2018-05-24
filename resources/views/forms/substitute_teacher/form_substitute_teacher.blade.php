<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($substituteTeacher->myself->name) ? $substituteTeacher->myself->name : null) }}" required>
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">E-Mail Address</label>
    <input class="form-control" id="email" type="email" name="email" value="{{ old('email', isset($substituteTeacher->myself->email) ? $substituteTeacher->myself->email : null) }}" required>
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('address')) has-error @endif">
    <label for="address">Address</label>
    <input class="form-control" id="address" name="address" value="{{ old('address', isset($substituteTeacher->address) ? $substituteTeacher->address : null) }}">
    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('city')) has-error @endif">
    <label for="city">City</label>
    <input class="form-control" id="city" name="city" value="{{ old('city', isset($substituteTeacher->city) ? $substituteTeacher->city : null) }}">
    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
</div>

<div class="form-group">
    <label for="province_id">Province</label>
    <select name="province_id" class="form-control">
        @foreach($provinces as $province)
            <option value="{{ $province->id }}" {{ (old("province_id", isset($substituteTeacher->province_id) ? $substituteTeacher->province_id : null) == $province->id ? "selected" : "") }}>{{ $province->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="country_id">Country</label>
    <select name="country_id" class="form-control">
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ (old("country_id", isset($substituteTeacher->country_id) ? $substituteTeacher->country_id : null) == $country->id ? "selected" : "") }}>{{ $country->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group @if ($errors->has('postal_code')) has-error @endif">
    <label for="postal_code">Postal Code</label>
    <input class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', isset($substituteTeacher->postal_code) ? $substituteTeacher->postal_code : null) }}">
    @if ($errors->has('postal_code')) <p class="help-block">{{ $errors->first('postal_code') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('phone')) has-error @endif">
    <label for="phone">Phone</label>
    <input class="form-control" id="phone" name="phone" value="{{ old('phone', isset($substituteTeacher->phone) ? $substituteTeacher->phone : null) }}">
    @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
</div>