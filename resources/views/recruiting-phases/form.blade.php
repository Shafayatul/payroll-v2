<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Field Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    {!! Form::label('color', 'Color', ['class' => 'control-label']) !!}
    <br/>
    {!! Form::text('color', null, ('' == 'required') ? ['class' => 'form-control colorpicker', 'required' => 'required'] : ['class' => 'form-control colorpicker']) !!}
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('max_days_in_phase') ? 'has-error' : ''}}">
    {!! Form::label('max_days_in_phase', 'Max Days In Phase', ['class' => 'control-label']) !!}
    {!! Form::number('max_days_in_phase', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('max_days_in_phase', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
