@extends('layouts.admin.master')
@section('title', "Company $company->name")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
            <li class="breadcrumb-item active">Company {{ $company->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Company {{ $company->name }}</div>
            <div class="card-body">

                <a href="{{ url('/companies') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/companies/' . $company->id . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['companies', $company->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Company',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Name </th>
                                <td> {{ $company->name }} </td>
                            </tr>
                            <tr>
                                <th> Is Sub Company Enable </th>
                                <td> 
                                    @if($company->is_sub_company_enable == 1)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th> Is Email Notification Enable </th>
                                <td> 
                                    @if($company->is_email_notification_enable == 1)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th> Language </th>
                                <td>
                                    @if($company->language == 1)
                                        <span class="text-success">English</span>
                                    @elseif($company->language == 2)
                                        <span class="text-success">Deutsch</span>
                                    @else
                                        <span class="text-success">Not Selected</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{ $company->currency }}</td>
                            </tr>
                            <tr>
                                <th>Industries</th>
                                <td>
                                    @isset($industries[$company->industry_id])
                                        {{ $industries[$company->industry_id] }}
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Timezone</th>
                                <td>{{ $company->timezone }}</td>
                            </tr>
                            <tr>
                                <th>Maintenance Email</th>
                                <td>{{ $company->maintenance_emails }}</td>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <td>
                                    <img src="{{ asset($company->logo) }}" alt="" style="width: 100px; height: 100px;">
                                </td>
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