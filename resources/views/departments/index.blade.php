@extends('layouts.admin.master')
@section('title', 'Departments')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Departments</a></li>
            <li class="breadcrumb-item active">Departments</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')

<div class="row gutter30">
    <div class="col-md-4">
        <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Departments</h4>
            <form method="POST" action="" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                <input name="_token" type="hidden" value=""> 
                <div class="input-group input-group-sm"> 
                    <input class="form-control" placeholder="New departments..." required="" minlength="2" name="name" type="text"> 
                    <span class="input-group-btn"> 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button> 
                    </span> 
                </div> 
            </form>
            <br>

            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                @foreach($departments as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link {{ $key == 1 ? 'active':'' }}" serial="{{ $item->id }}" data-toggle="tab" href="#{{ $item->id }}" role="tab">
                            {{ $item->name }}
                            <span class="badge pull-right" data-toggle="tooltip" title="" data-original-title="7 active employees, 9 total">
                                7
                            </span>
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        @foreach($departments as $key => $item)
        <div class="block-section tab-pane active" id="{{ $item->id }}" role="tabpanel">
            <h4 class="sub-header">
                {{ $item->name }} 
                <small> 
                    <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible1();">
                        (Edit)
                    </a> 
                </small> 
                <a href="#modal-delete-office" data-toggle="modal"> 
                    <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office">
                        
                    </i> 
                </a>
            </h4>
            <div class="form-horizontal form-striped compact" id="office-div1">
                <div class="form-group row"><label class="col-md-3 control-label"> Department name </label>
                    <div class="col-md-5"> <p class="form-control-static">{{ $item->name }} </p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Weekly working hours </label>
                    <div class="col-md-5 form-control-static"> {{ $item->working_hour }} </div>
                </div>
            </div>
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office1" novalidate="novalidate">
               
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="ddd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="ddd">
                    </div>
                </div>

                
                <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible1();"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div> 
        @endforeach

    </div>
</div>
@endsection
@section('admin-additional-js')
<script type="text/javascript">
    

    $(document).ready(function(){
        var tabpanel_id = $(".tab-pane").attr('id');
        $("#"+tabpanel_id).hide();
        $(".nav-link").click(function(){
            var tab_id = $(this).attr('serial');
            if(tab_id == tabpanel_id){
                $("#"+tabpanel_id).show(500);
            }    
        });
      
    });
    
     
    function switchVisible() {
        if (document.getElementById('office-div')) {

            if (document.getElementById('office-div').style.display == 'none') {
                document.getElementById('office-div').style.display = 'block';
                document.getElementById('office').style.display = 'none';
            }
            else {
                document.getElementById('office-div').style.display = 'none';
                document.getElementById('office').style.display = 'block';
            }
        }
    }


  </script>
@endsection