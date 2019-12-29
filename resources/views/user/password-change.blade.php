@extends('layouts.admin.master')
@section('title', 'Home')
@section('admin-additional-css')
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active">Password Change</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Password Change</div>
            <div class="card-body">
                <a href="{{ url('/home') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('password-update') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Old Password</label>
                        <div class="col-md-9">
                            <input type="password" name="old_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">New Password</label>
                        <div class="col-md-9">
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Confirm Password</label>
                        <div class="col-md-9">
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('admin-additional-js')
@endsection