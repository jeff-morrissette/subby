<div class="form-group">
    <label for="school_division_id">School Division Name</label>
    <select name="school_division_id" class="form-control">
        @foreach($schoolDivisions as $schoolDivision)
            <option value="{{ $schoolDivision->id }}" {{ (old("school_division_id", isset($school->school_division_id) ? $school->school_division_id : null) == $schoolDivision->id ? "selected" : "") }}>{{ $schoolDivision->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group @if ($errors->has('name')) has-error @endif">
    <label for="name">Name</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', isset($school->name) ? $school->name : null) }}">
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('address')) has-error @endif">
    <label for="address">Address</label>
    <input class="form-control" id="address" name="address" value="{{ old('address', isset($school->address) ? $school->address : null) }}">
    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('city')) has-error @endif">
    <label for="city">City</label>
    <input class="form-control" id="city" name="city" value="{{ old('city', isset($school->city) ? $school->city : null) }}">
    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
</div>

<div class="form-group">
    <label for="province_id">Province</label>
    <select name="province_id" class="form-control">
        @foreach($provinces as $province)
            <option value="{{ $province->id }}" {{ (old("province_id", isset($school->province_id) ? $school->province_id : null) == $province->id ? "selected" : "") }}>{{ $province->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="country_id">Country</label>
    <select name="country_id" class="form-control">
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ (old("country_id", isset($school->country_id) ? $school->country_id : null) == $country->id ? "selected" : "") }}>{{ $country->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group @if ($errors->has('postal_code')) has-error @endif">
    <label for="postal_code">Postal Code</label>
    <input class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', isset($school->postal_code) ? $school->postal_code : null) }}">
    @if ($errors->has('postal_code')) <p class="help-block">{{ $errors->first('postal_code') }}</p> @endif
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start_time_hour">Start Time Hour</label>
            <select name="start_time_hour" class="form-control">
                <option value="07" {{ (old("start_time_hour", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('h')) == '07' ? "selected" : "") }}>07</option>
                <option value="08" {{ (old("start_time_hour", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('h')) == '08' ? "selected" : "") }}>08</option>
                <option value="09" {{ (old("start_time_hour", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('h')) == '09' ? "selected" : "") }}>09</option>
            </select>
            @if ($errors->has('start_time_hour')) <p class="help-block">{{ $errors->first('start_time_hour') }}</p> @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start_time_minute">Start Time Minute</label>
            <select name="start_time_minute" class="form-control">
                <option value="00" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '00' ? "selected" : "") }}>00</option>
                <option value="05" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '05' ? "selected" : "") }}>05</option>
                <option value="10" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '10' ? "selected" : "") }}>10</option>
                <option value="15" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '15' ? "selected" : "") }}>15</option>
                <option value="20" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '20' ? "selected" : "") }}>20</option>
                <option value="25" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '25' ? "selected" : "") }}>25</option>
                <option value="30" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '30' ? "selected" : "") }}>30</option>
                <option value="35" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '35' ? "selected" : "") }}>35</option>
                <option value="40" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '40' ? "selected" : "") }}>40</option>
                <option value="45" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '45' ? "selected" : "") }}>45</option>
                <option value="50" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '50' ? "selected" : "") }}>50</option>
                <option value="55" {{ (old("start_time_minute", Carbon\Carbon::parse(isset($school->start_time_school) ? $school->start_time_school : null)->format('i')) == '55' ? "selected" : "") }}>55</option>
            </select>
            @if ($errors->has('start_time_minute')) <p class="help-block">{{ $errors->first('start_time_minute') }}</p> @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start_time_lunch_hour">Lunch Start Time Hour</label>
            <select name="start_time_lunch_hour" class="form-control">
                <option value="11" {{ (old("start_time_lunch_hour", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('h')) == '11' ? "selected" : "") }}>11</option>
                <option value="12" {{ (old("start_time_lunch_hour", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('h')) == '12' ? "selected" : "") }}>12</option>
            </select>
            @if ($errors->has('start_time_lunch_hour')) <p class="help-block">{{ $errors->first('start_time_lunch_hour') }}</p> @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start_time_lunch_minute">Lunch Start Time Minute</label>
            <select name="start_time_lunch_minute" class="form-control">
                <option value="00" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '00' ? "selected" : "") }}>00</option>
                <option value="05" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '05' ? "selected" : "") }}>05</option>
                <option value="10" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '10' ? "selected" : "") }}>10</option>
                <option value="15" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '15' ? "selected" : "") }}>15</option>
                <option value="20" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '20' ? "selected" : "") }}>20</option>
                <option value="25" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '25' ? "selected" : "") }}>25</option>
                <option value="30" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '30' ? "selected" : "") }}>30</option>
                <option value="35" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '35' ? "selected" : "") }}>35</option>
                <option value="40" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '40' ? "selected" : "") }}>40</option>
                <option value="45" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '45' ? "selected" : "") }}>45</option>
                <option value="50" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '50' ? "selected" : "") }}>50</option>
                <option value="55" {{ (old("start_time_lunch_minute", Carbon\Carbon::parse(isset($school->start_time_lunch) ? $school->start_time_lunch : null)->format('i')) == '55' ? "selected" : "") }}>55</option>
            </select>
            @if ($errors->has('start_time_lunch_minute')) <p class="help-block">{{ $errors->first('start_time_lunch_minute') }}</p> @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="end_time_lunch_hour">Lunch End Time Hour</label>
            <select name="end_time_lunch_hour" class="form-control">
                <option value="12" {{ (old("end_time_lunch_hour", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('H')) == '12' ? "selected" : "") }}>12</option>
                <option value="13" {{ (old("end_time_lunch_hour", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('H')) == '13' ? "selected" : "") }}>01</option>
            </select>
            @if ($errors->has('end_time_lunch_hour')) <p class="help-block">{{ $errors->first('end_time_lunch_hour') }}</p> @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="end_time_lunch_minute">Lunch End Time Minute</label>
            <select name="end_time_lunch_minute" class="form-control">
                <option value="00" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '00' ? "selected" : "") }}>00</option>
                <option value="05" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '05' ? "selected" : "") }}>05</option>
                <option value="10" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '10' ? "selected" : "") }}>10</option>
                <option value="15" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '15' ? "selected" : "") }}>15</option>
                <option value="20" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '20' ? "selected" : "") }}>20</option>
                <option value="25" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '25' ? "selected" : "") }}>25</option>
                <option value="30" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '30' ? "selected" : "") }}>30</option>
                <option value="35" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '35' ? "selected" : "") }}>35</option>
                <option value="40" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '40' ? "selected" : "") }}>40</option>
                <option value="45" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '45' ? "selected" : "") }}>45</option>
                <option value="50" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '50' ? "selected" : "") }}>50</option>
                <option value="55" {{ (old("end_time_lunch_minute", Carbon\Carbon::parse(isset($school->end_time_lunch) ? $school->end_time_lunch : null)->format('i')) == '55' ? "selected" : "") }}>55</option>
            </select>
            @if ($errors->has('end_time_lunch_minute')) <p class="help-block">{{ $errors->first('end_time_lunch_minute') }}</p> @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="end_time_hour">End Time Hour</label>
            <select name="end_time_hour" class="form-control">
                <option value="15" {{ (old("end_time_hour", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('H')) == '15' ? "selected" : "") }}>03</option>
                <option value="16" {{ (old("end_time_hour", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('H')) == '16' ? "selected" : "") }}>04</option>
            </select>
            @if ($errors->has('end_time_hour')) <p class="help-block">{{ $errors->first('end_time_hour') }}</p> @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="end_time_minute">End Time Minute</label>
            <select name="end_time_minute" class="form-control">
                <option value="00" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '00' ? "selected" : "") }}>00</option>
                <option value="05" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '05' ? "selected" : "") }}>05</option>
                <option value="10" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '10' ? "selected" : "") }}>10</option>
                <option value="15" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '15' ? "selected" : "") }}>15</option>
                <option value="20" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '20' ? "selected" : "") }}>20</option>
                <option value="25" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '25' ? "selected" : "") }}>25</option>
                <option value="30" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '30' ? "selected" : "") }}>30</option>
                <option value="35" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '35' ? "selected" : "") }}>35</option>
                <option value="40" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '40' ? "selected" : "") }}>40</option>
                <option value="45" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '45' ? "selected" : "") }}>45</option>
                <option value="50" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '50' ? "selected" : "") }}>50</option>
                <option value="55" {{ (old("end_time_minute", Carbon\Carbon::parse(isset($school->end_time_school) ? $school->end_time_school : null)->format('i')) == '55' ? "selected" : "") }}>55</option>
            </select>
            @if ($errors->has('end_time_minute')) <p class="help-block">{{ $errors->first('end_time_minute') }}</p> @endif
        </div>
    </div>
</div>