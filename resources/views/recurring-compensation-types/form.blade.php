<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_system_type') ? 'has-error' : ''}}">
    {!! Form::label('is_system_type', 'Is System Type ?', ['class' => 'control-label']) !!}
    <div class="checkbox checkbox-success">
        <input type="checkbox" name="is_system_type" id="checkbox3" @isset($recurringcompensationtype->is_system_type) @if($recurringcompensationtype->is_system_type == 1) ? checked @endif @endisset>
        <label for="checkbox3" style="width: 4% !important"> Yes </label>
    </div>
    {!! $errors->first('is_system_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
