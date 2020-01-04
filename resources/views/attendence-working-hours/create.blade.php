@extends('layouts.admin.master')
@section('title', 'Create New AttendenceWorkingHour')
@section('admin-additional-css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">AttendenceWorkingHour</a></li>
            <li class="breadcrumb-item active">Create New AttendenceWorkingHour</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Create New AttendenceWorkingHour</div>
            <div class="card-body">
                <a href="{{ url('/attendence-working-hours') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::open(['url' => '/attendence-working-hours', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('attendence-working-hours.form', ['formMode' => 'create'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script type="text/javascript">
    $('.time').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '00.00',
        maxTime: '23.30',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    $('#start').focusout(function() {
        setTimeout(function(){
            $("#working_hour").attr('disabled','disabled');
        }, 1000);
    });
</script>
@endsection