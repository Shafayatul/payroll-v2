@extends('layouts.admin.master')
@section('title', "RecurringCompensationType $recurringcompensationtype->name")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">RecurringCompensationType</a></li>
            <li class="breadcrumb-item active">RecurringCompensationType {{ $recurringcompensationtype->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">RecurringCompensationType {{ $recurringcompensationtype->name }}</div>
            <div class="card-body">

                <a href="{{ url('/recurring-compensation-types') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/recurring-compensation-types/' . $recurringcompensationtype->id . '/edit') }}" title="Edit RecurringCompensationType"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['recurring-compensation-types', $recurringcompensationtype->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete RecurringCompensationType',
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
                                <td> {{ $recurringcompensationtype->name }} </td>
                            </tr>
                            <tr>
                                <th> Is System Type ?</th>
                                <td> 
                                    @if($recurringcompensationtype->is_system_type == 0)
                                        <span class="text-danger">No</span>
                                    @else
                                        <span class="text-success">Yes</span>
                                    @endif
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