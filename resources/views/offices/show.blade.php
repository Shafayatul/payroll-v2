@extends('layouts.admin.master')
@section('title', "Office $office->name")
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Office</a></li>
            <li class="breadcrumb-item active">Office {{ $office->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Office {{ $office->name }}</div>
            <div class="card-body">

                <a href="{{ url('/offices') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/offices/' . $office->id . '/edit') }}" title="Edit Office"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['offices', $office->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Office',
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
                                <td> {{ $office->name }} </td>
                            </tr>
                            <tr>
                                <th> Currency </th>
                                <td> {{ $office->currency }} </td>
                            </tr>
                            <tr>
                                <th> Timezone </th>
                                <td> {{ $office->timezone }} </td>
                            </tr>
                            <tr>
                                <th> Street </th>
                                <td> {{ $office->street }} </td>
                            </tr>
                            <tr>
                                <th> Street Additional </th>
                                <td> {{ $office->street_additional }} </td>
                            </tr>
                            <tr>
                                <th> House </th>
                                <td> {{ $office->house }} </td>
                            </tr>
                            <tr>
                                <th> City </th>
                                <td> {{ $office->city }} </td>
                            </tr>
                            <tr>
                                <th> State </th>
                                <td> {{ $office->state }} </td>
                            </tr>
                            <tr>
                                <th> Zip </th>
                                <td> {{ $office->zip }} </td>
                            </tr>
                            <tr>
                                <th> Country </th>
                                <td>
                                    @isset($countries[$office->country]) 
                                        {{ $countries[$office->country] }}
                                    @endisset 
                                </td>
                            </tr>
                            <tr>
                                <th> Company </th>
                                <td>
                                    @isset($companies[$office->company_id]) 
                                        {{ $companies[$office->company_id] }}
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