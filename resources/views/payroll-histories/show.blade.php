@extends('layouts.admin.master')
@section('title', "PayrollHistory $payrollhistory->id")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">PayrollHistory</a></li>
            <li class="breadcrumb-item active">PayrollHistory {{ $payrollhistory->id }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">PayrollHistory {{ $payrollhistory->id }}</div>
            <div class="card-body">

                <a href="{{ url('/payroll-histories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/payroll-histories/' . $payrollhistory->id . '/edit') }}" title="Edit PayrollHistory"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['payrollhistories', $payrollhistory->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete PayrollHistory',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> User </th>
                                <td> 
                                    @isset($users[$payrollhistory->user_id])
                                        {{ $users[$payrollhistory->user_id] }}
                                    @endisset 
                                </td>
                            </tr>
                            <tr>
                                <th> Amount </th>
                                <td> {{ $payrollhistory->amount }} </td>
                            </tr>
                            <tr>
                                <th> Date </th>
                                <td> {{ Carbon\Carbon::parse($payrollhistory->date)->format('d-m-Y')}} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $payrollhistory->description }} </td>
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