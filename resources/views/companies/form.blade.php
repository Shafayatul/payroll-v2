<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Company name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_sub_company_enable') ? 'has-error' : ''}}">
    {!! Form::label('is_sub_company_enable', 'Sub-companies enabled', ['class' => 'control-label']) !!}
    <div class="checkbox checkbox-success">
        <input type="checkbox" name="is_sub_company_enable" id="checkbox3" @isset($company->is_sub_company_enable) @if($company->is_sub_company_enable == 1) ? checked @endif @endisset>
        <label for="checkbox3" style="width: 4% !important"> Yes </label>
    </div>
    {!! $errors->first('is_sub_company_enable', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_email_notification_enable') ? 'has-error' : ''}}">
    {!! Form::label('is_email_notification_enable', 'Email notifications enabled', ['class' => 'control-label']) !!}
    <div class="checkbox checkbox-success">
        <input type="checkbox" name="is_email_notification_enable" id="checkbox2" @isset($company->is_email_notification_enable) @if($company->is_email_notification_enable == 1) ? checked @endif @endisset>
        <label for="checkbox2" style="width: 4% !important"> Yes </label>
    </div>
    {!! $errors->first('is_email_notification_enable', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
    {!! Form::label('language', 'Language', ['class' => 'control-label']) !!}
    {!! Form::select('language', ['' => '--Select Language--', '1' => 'English', '2' => 'Deutsch'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
    {!! Form::label('currency', 'Currency', ['class' => 'control-label']) !!}
    <select name="currency" class="form-control select2" required>
        <option value="">--Select Currency--</option>
        @foreach($currencies as $key => $value)
            <option value="{{ $value->abbreviation }}" @isset($company->currency) @if($value->abbreviation == $company->currency) ? selected @endif @endisset>
                {!! $value->abbreviation.' ('.$value->symbol.')' !!}
            </option>
        @endforeach
    </select> 
    {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('industry_id') ? 'has-error' : ''}}">
    {!! Form::label('industry_id', 'Industry', ['class' => 'control-label']) !!}
    {!! Form::select('industry_id', $industries, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Industry--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Industry--']) !!}
    {!! $errors->first('industry_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('timezone') ? 'has-error' : ''}}">
    {!! Form::label('timezone', 'Timezone', ['class' => 'control-label']) !!}
    <select name="timezone" class="form-control select2" required>
        <option value="">--Select Timezone--</option>
        @foreach($timezones as $value)
            <option value="{{ $value }}" @isset($company->timezone) @if($value == $company->timezone) ? selected @endif @endisset>
                {!! $value !!}
            </option>
        @endforeach
    </select> 
    {!! $errors->first('timezone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('public_holiday_id') ? 'has-error' : ''}}">
    {!! Form::label('public_holiday_id', 'Public Holiday', ['class' => 'control-label']) !!}
    {!! Form::select('public_holiday_id', $holidays, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Public Holiday--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Public Holiday--']) !!}
    {!! $errors->first('public_holiday_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maintenance_emails') ? 'has-error' : ''}}">
    {!! Form::label('maintenance_emails', 'Maintenance Emails', ['class' => 'control-label']) !!}
    <div class="tags-default">
        {!! Form::text('maintenance_emails[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'data-role' => 'tagsinput'] : ['class' => 'form-control', 'data-role' => 'tagsinput']) !!}
    </div>
    {!! $errors->first('maintenance_emails', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
    {!! Form::file('logo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode == 'edit')
    <div class="form-group">
        <img src="{{ asset($company->logo) }}" alt="" style="width: 200px; height: 200px;">
    </div>
@endif

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
