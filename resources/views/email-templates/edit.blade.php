@extends('layouts.admin.master')
@section('title', "Edit EmailTemplate # $emailtemplate->name ")
@section('admin-additional-css')
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">EmailTemplate</a></li>
            <li class="breadcrumb-item active">Edit EmailTemplate #{{ $emailtemplate->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit EmailTemplate #{{ $emailtemplate->name }}</div>
            <div class="card-body">
                <a href="{{ url('/email-templates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::model($emailtemplate, [
                    'method' => 'PATCH',
                    'url' => ['/email-templates', $emailtemplate->id],
                    'class' => 'form-horizontal',
                    'files' => true
                ]) !!}

                @include ('email-templates.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
@endsection