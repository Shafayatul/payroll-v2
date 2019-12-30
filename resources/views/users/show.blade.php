@extends('layouts.admin.master')
@section('title', "User $user->id")
@section('admin-additional-css')
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active">User {{ $user->id }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">User {{ $user->id }}</div>
            <div class="card-body">

                <a href="{{ url('/users') }}" title="Back">
                    <button class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                        Back
                    </button>
                </a>
                <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Edit User">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                        Edit
                    </button>
                </a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['users', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete User',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $user->name }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <th> Password </th>
                                <td> {{ $user->password }} </td>
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