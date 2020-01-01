<div class="card">
    <div class="card-header card-success text-white">Email Setting</div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
    {!! Form::text('subject', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
    {!! Form::textarea('message', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'rows' => '2', 'cols' => '3'] : ['class' => 'form-control', 'rows' => '2', 'cols' => '3']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<div class="card">
    <div class="card-header card-success text-white">SMTP Setting</div>
</div>
<div class="form-group {{ $errors->has('smtp_host') ? 'has-error' : ''}}">
    {!! Form::label('smtp_host', 'Smtp Host', ['class' => 'control-label']) !!}
    {!! Form::text('smtp_host', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('smtp_host', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('smtp_port') ? 'has-error' : ''}}">
    {!! Form::label('smtp_port', 'Smtp Port', ['class' => 'control-label']) !!}
    {!! Form::text('smtp_port', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('smtp_port', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('smtp_encryption') ? 'has-error' : ''}}">
    {!! Form::label('smtp_encryption', 'Smtp Encryption', ['class' => 'control-label']) !!}
    {!! Form::select('smtp_encryption',['' => '--Select Encryption--', 'TLS' => 'TLS', 'SSL' => 'SSL'], null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required'] : ['class' => 'form-control select2']) !!}
    {!! $errors->first('smtp_encryption', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('smtp_username') ? 'has-error' : ''}}">
    {!! Form::label('smtp_username', 'Smtp Username', ['class' => 'control-label']) !!}
    {!! Form::text('smtp_username', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('smtp_username', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('smtp_password') ? 'has-error' : ''}}">
    {!! Form::label('smtp_password', 'Smtp Password', ['class' => 'control-label']) !!}
    {!! Form::text('smtp_password', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('smtp_password', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
