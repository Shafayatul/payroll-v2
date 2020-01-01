<div class="form-group {{ $errors->has('feedback_category_id') ? 'has-error' : ''}}">
    {!! Form::label('feedback_category_id', 'Feedback Category', ['class' => 'control-label']) !!}
    {!! Form::select('feedback_category_id', $feedback_categories, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Category--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Category--']) !!}
    {!! $errors->first('feedback_category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_required') ? 'has-error' : ''}}">
    {!! Form::label('is_required', 'Is Required', ['class' => 'control-label']) !!}
    <div class="checkbox checkbox-success">
        <input type="checkbox" name="is_required" id="checkbox2" @isset($feedbackcategoryattribute->is_required) @if($feedbackcategoryattribute->is_required == 1) ? checked @endif @endisset>
        <label for="checkbox2" style="width: 4% !important"> Yes </label>
    </div>
    {!! $errors->first('is_required', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
