<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
            {!! Form::label('currency', 'Currency', ['class' => 'control-label']) !!}
            <select name="currency" class="form-control select2" required>
                <option value="">--Select Currency--</option>
                @foreach($currencies as $key => $value)
                    <option value="{{ $value->abbreviation }}" @isset($office->currency) @if($value->abbreviation == $office->currency) ? selected @endif @endisset>
                        {!! $value->abbreviation.' ('.$value->symbol.')' !!}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('timezone') ? 'has-error' : ''}}">
            {!! Form::label('timezone', 'Timezone', ['class' => 'control-label']) !!}
            <select name="timezone" class="form-control select2" required>
                <option value="">--Select Timezone--</option>
                @foreach($timezones as $value)
                    <option value="{{ $value }}" @isset($office->timezone) @if($value == $office->timezone) ? selected @endif @endisset>
                        {!! $value !!}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('timezone', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
            {!! Form::label('street', 'Street', ['class' => 'control-label']) !!}
            {!! Form::text('street', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('house') ? 'has-error' : ''}}">
            {!! Form::label('house', 'House', ['class' => 'control-label']) !!}
            {!! Form::text('house', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('house', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('street_additional') ? 'has-error' : ''}}">
            {!! Form::label('street_additional', 'Additional Street Address', ['class' => 'control-label']) !!}
            {!! Form::text('street_additional', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('street_additional', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('zip') ? 'has-error' : ''}}">
            {!! Form::label('zip', 'Zip', ['class' => 'control-label']) !!}
            {!! Form::text('zip', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
            {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
            {!! Form::text('city', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
            {!! Form::label('state', 'State', ['class' => 'control-label']) !!}
            {!! Form::text('state', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
            {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
            <select name="country" class="form-control select2" required>
                <option value="">--Select Country--</option>
                @foreach($countries as $key => $value)
                    <option value="{{ $key }}" @isset($office->country) @if($key == $office->country) ? selected @endif @endisset>
                        {!! $value !!}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('public_holiday_id') ? 'has-error' : ''}}">
            {!! Form::label('public_holiday_id', 'Public Holiday', ['class' => 'control-label']) !!}
            {!! Form::select('public_holiday_id', [], null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Public Holiday--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Public Holiday--']) !!}
            {!! $errors->first('public_holiday_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
            {!! Form::label('company_id', 'Company', ['class' => 'control-label']) !!}
            {!! Form::select('company_id', $companies, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Company--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Company--']) !!}
            {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>



