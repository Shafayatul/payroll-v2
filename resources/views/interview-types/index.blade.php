@extends('layouts.admin.master')
@section('title', 'Interviewtypes')
@section('admin-additional-css')
<style type="text/css">
    .table thead th{
        border: 1px solid #dee2e6;
    }
</style>
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Interviewtypes</a></li>
            <li class="breadcrumb-item active">Interviewtypes</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Interviewtypes</div>
            <div class="card-body">
                <a href="{{ url('/interview-types/create') }}" class="btn btn-success btn-sm" title="Add New InterviewType">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>

                {!! Form::open(['method' => 'GET', 'url' => '/interview-types', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                {!! Form::close() !!}

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th><th>Name</th>
                                <th>Sort Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($interviewtypes as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->sort_order }}</td>
                                <td>
                                    <a href="{{ url('/interview-types/' . $item->id) }}" title="View InterviewType"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    <a href="{{ url('/interview-types/' . $item->id . '/edit') }}" title="Edit InterviewType"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/interview-types', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Delete InterviewType',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $interviewtypes->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
@endsection