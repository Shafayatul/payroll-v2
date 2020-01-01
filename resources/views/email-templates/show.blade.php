@extends('layouts.admin.master')
@section('title', "EmailTemplate $emailtemplate->name")
@section('admin-additional-css')
<style type="text/css">
    .table th{
        border: 1px solid #dee2e6;
    }
</style>
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">EmailTemplate</a></li>
            <li class="breadcrumb-item active">EmailTemplate {{ $emailtemplate->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">EmailTemplate {{ $emailtemplate->name }}</div>
            <div class="card-body">

                <a href="{{ url('/email-templates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/email-templates/' . $emailtemplate->id . '/edit') }}" title="Edit EmailTemplate"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['email-templates', $emailtemplate->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete EmailTemplate',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header card-success text-white">Email Setting</div>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Name </th>
                                <td> {{ $emailtemplate->name }} </td>
                            </tr>
                            <tr>
                                <th> Subject </th>
                                <td> {{ $emailtemplate->subject }} </td>
                            </tr>
                            <tr>
                                <th> Message </th>
                                <td> {{ $emailtemplate->message }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header card-success text-white">SMTP Setting</div>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> SMTP Host </th>
                                <td> {{ $emailtemplate->smtp_host }} </td>
                            </tr>
                            <tr>
                                <th> SMTP Port </th>
                                <td> {{ $emailtemplate->smtp_port }} </td>
                            </tr>
                            <tr>
                                <th> SMTP Encryption </th>
                                <td> {{ $emailtemplate->smtp_encryption }} </td>
                            </tr>
                            <tr>
                                <th> SMTP Username </th>
                                <td> {{ $emailtemplate->smtp_username }} </td>
                            </tr>
                            <tr>
                                <th> SMTP Password </th>
                                <td> {{ $emailtemplate->smtp_password }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
@endsection