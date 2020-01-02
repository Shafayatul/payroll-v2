@extends('layouts.admin.master')
@section('title', 'Create New RecruitingPhase')
@section('admin-additional-css')
<!-- Color picker plugins css -->
<link href="{{ asset('admin/assets/plugins/jquery-asColorPicker-master/dist/css/asColorPicker.css') }}" rel="stylesheet">
<style type="text/css">
    .asColorPicker-trigger {
        position: absolute !important;
        display: inline-block;
        top: 0;
        right: 3px;
        height: 34px;
        width: 35px;
        border-radius: 5px;
        margin-top: 2px;
    }
    .asColorPicker-dropdown{
        max-width: 270px !important;
        cursor: crosshair;
    }
</style>

@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">RecruitingPhase</a></li>
            <li class="breadcrumb-item active">Create New RecruitingPhase</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Create New RecruitingPhase</div>
            <div class="card-body">
                <a href="{{ url('/recruiting-phases') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::open(['url' => '/recruiting-phases', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('recruiting-phases.form', ['formMode' => 'create'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/jquery-asColor/dist/jquery-asColor.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
<script type="text/javascript">
     // Colorpicker
    $(".colorpicker").asColorPicker();
</script>
@endsection