@extends('layouts.admin.master')
@section('title', "Holiday $holiday->name")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Holiday</a></li>
            <li class="breadcrumb-item active">Holiday {{ $holiday->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Holiday {{ $holiday->name }}</div>
            <div class="card-body">

                <a href="{{ url('/holidays') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/holidays/' . $holiday->id . '/edit') }}" title="Edit Holiday"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['holidays', $holiday->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Holiday',
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
                                <td> {{ $holiday->name }} </td>
                            </tr>
                            <tr>
                                <th> Details </th>
                                <td> {{ $holiday->details }} </td>
                            </tr>
                            <tr>
                                <th> Is Halfday </th>
                                <td> 
                                    @if($holiday->is_halfday != null)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <th>Public Holiday Calendar</th>
                                <td>
                                    @isset($public_holiday_calendars[$holiday->public_holiday_calendar_id])
                                        {{ $public_holiday_calendars[$holiday->public_holiday_calendar_id] }}
                                    @endisset
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