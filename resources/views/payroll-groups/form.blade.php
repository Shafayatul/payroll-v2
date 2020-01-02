<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    {!! Form::label('company_id', 'Company', ['class' => 'control-label']) !!}
    {!! Form::select('company_id', $companies, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Company--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Company--']) !!}
    {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('val_id') ? 'has-error' : ''}}">
    {!! Form::label('val_id', 'Val Id', ['class' => 'control-label']) !!}
    {!! Form::text('val_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('val_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
    {!! Form::label('start', 'Start', ['class' => 'control-label']) !!}
    {!! Form::text('start', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
    {!! Form::label('end', 'End', ['class' => 'control-label']) !!}
    {!! Form::text('end', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_from') ? 'has-error' : ''}}">
    {!! Form::label('start_from', 'Start From', ['class' => 'control-label']) !!}
    {!! Form::text('start_from', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('start_from', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
