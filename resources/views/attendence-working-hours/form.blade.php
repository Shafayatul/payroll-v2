<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('office_id') ? 'has-error' : ''}}">
            {!! Form::label('office_id', 'Office', ['class' => 'control-label']) !!}
            {!! Form::select('office_id', $offices, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Office--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Office--']) !!}
            {!! $errors->first('office_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

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
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Weekday</label>
            <select name="weekday" class="form-control select2 text-center" required>
                <option value="">--Select Weekday--</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <label class="control-label">Working Hours</label>
        <input type="text" name="working_hour" class="form-control time" id="working_hour" placeholder="hh:mm">
    </div>
    <div class="col-md-2">
        <label class="control-label">Start</label>
        <input type="text" name="start" class="form-control time" id="start" placeholder="hh:mm">
    </div>
    <div class="col-md-2">
        <label class="control-label">End</label>
        <input type="text" name="end" class="form-control time" id="end" placeholder="hh:mm">
    </div>
    <div class="col-md-2">
        <label class="control-label">Break Time</label>
        <input type="text" name="break_time" class="form-control time" id="break_time" placeholder="hh:mm">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('is_track_overtime') ? 'has-error' : ''}}">
            {!! Form::label('is_track_overtime', 'Track Overtime ?', ['class' => 'control-label']) !!}
            <div class="checkbox checkbox-success">
                <input type="checkbox" name="is_track_overtime" id="checkbox2" @isset($attendenceworkinghour->is_track_overtime) @if($attendenceworkinghour->is_track_overtime == 1) ? checked @endif @endisset>
                <label for="checkbox2" style="width: 4% !important"> Yes </label>
            </div>
            {!! $errors->first('is_track_overtime', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('overtime_calculation') ? 'has-error' : ''}}">
            {!! Form::label('overtime_calculation', 'Overtime Calculation', ['class' => 'control-label']) !!}
            {!! Form::select('overtime_calculation', ['' => '--Select Overtime Calculation--', 'daily' => 'daily', 'weekly' => 'weekly'], null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required'] : ['class' => 'form-control select2']) !!}
            {!! $errors->first('overtime_calculation', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('overtime_cliff') ? 'has-error' : ''}}">
            {!! Form::label('overtime_cliff', 'Overtime Cliff', ['class' => 'control-label']) !!}
            {!! Form::text('overtime_cliff', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('overtime_cliff', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('deficit_hours') ? 'has-error' : ''}}">
            {!! Form::label('deficit_hours', 'Deficit Hours', ['class' => 'control-label']) !!}
            <div class="checkbox checkbox-success">
                <input type="checkbox" name="deficit_hours" id="checkbox3" @isset($attendenceworkinghour->deficit_hours) @if($attendenceworkinghour->deficit_hours == 1) ? checked @endif @endisset>
                <label for="checkbox3" style="width: 4% !important"> Yes </label>
            </div>
            {!! $errors->first('deficit_hours', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('is_prorate_vacation') ? 'has-error' : ''}}">
            {!! Form::label('is_prorate_vacation', 'Is Prorate Vacation', ['class' => 'control-label']) !!}
            <div class="checkbox checkbox-success">
                <input type="checkbox" name="is_prorate_vacation" id="checkbox4" @isset($attendenceworkinghour->is_prorate_vacation) @if($attendenceworkinghour->is_prorate_vacation == 1) ? checked @endif @endisset>
                <label for="checkbox4" style="width: 4% !important"> Yes </label>
            </div>
            {!! $errors->first('is_prorate_vacation', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('reference_value') ? 'has-error' : ''}}">
            {!! Form::label('reference_value', 'Reference Value', ['class' => 'control-label']) !!}
            {!! Form::select('reference_value', ['' => '--Select Reference Value--', '4' => '4', '5' => '5', '6' => '6', '7' => '7'], null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required'] : ['class' => 'form-control select2']) !!}
            {!! $errors->first('reference_value', '<p class="help-block">:message</p>') !!}
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