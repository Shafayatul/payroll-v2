<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    {!! Form::label('details', 'Details', ['class' => 'control-label']) !!}
    {!! Form::textarea('details', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'rows' => '2', 'cols' => '3'] : ['class' => 'form-control', 'rows' => '2', 'cols' => '3']) !!}
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_halfday') ? 'has-error' : ''}}">
    {!! Form::label('is_halfday', 'Is Halfday', ['class' => 'control-label']) !!}
    <div class="checkbox checkbox-success">
        <input type="checkbox" name="is_halfday" id="checkbox3" @isset($holiday->is_halfday) @if($holiday->is_halfday != null) ? checked @endif @endisset>
        <label for="checkbox3" style="width: 4% !important"> Yes </label>
    </div>
    {!! $errors->first('is_halfday', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('public_holiday_calendar_id') ? 'has-error' : ''}}">
    {!! Form::label('public_holiday_calendar_id', 'Public Holiday Calendar Id', ['class' => 'control-label']) !!}
    {!! Form::select('public_holiday_calendar_id', $public_holiday_calendars, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Public Holiday Calendar--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Public Holiday Calendar--']) !!}
    {!! $errors->first('public_holiday_calendar_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
