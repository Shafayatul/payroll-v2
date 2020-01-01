@extends('layouts.admin.master')
@section('title', "InterviewType $interviewtype->name")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">InterviewType</a></li>
            <li class="breadcrumb-item active">InterviewType {{ $interviewtype->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">InterviewType {{ $interviewtype->name }}</div>
            <div class="card-body">

                <a href="{{ url('/interview-types') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/interview-types/' . $interviewtype->id . '/edit') }}" title="Edit InterviewType"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['interview-types', $interviewtype->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete InterviewType',
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
                                <td> {{ $interviewtype->name }} </td>
                            </tr>
                            <tr>
                                <th> Sort Order </th>
                                <td> {{ $interviewtype->sort_order }} </td>
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