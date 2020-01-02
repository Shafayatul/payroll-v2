@extends('layouts.admin.master')
@section('title', "Edit PayrollGroup # $payrollgroup->id ")
@section('admin-additional-css')
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">PayrollGroup</a></li>
            <li class="breadcrumb-item active">Edit PayrollGroup #{{ $payrollgroup->id }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit PayrollGroup #{{ $payrollgroup->id }}</div>
            <div class="card-body">
                <a href="{{ url('/payroll-groups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::model($payrollgroup, [
                    'method' => 'PATCH',
                    'url' => ['/payroll-groups', $payrollgroup->id],
                    'class' => 'form-horizontal',
                    'files' => true
                ]) !!}

                @include ('payroll-groups.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
@endsection