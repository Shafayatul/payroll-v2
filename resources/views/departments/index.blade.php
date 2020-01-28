@extends('layouts.admin.master')
@section('title', 'Departments')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="row gutter30">
    <div class="col-md-4">
        <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Departments</h4>
            <form method="POST" action="{{ route('departments.store') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                @csrf
                <div class="input-group input-group-sm"> 
                    <input class="form-control" placeholder="New office..." required="" minlength="2" name="name" type="text"> 
                    <span class="input-group-btn"> 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button> 
                    </span> 
                </div> 
            </form>
            <br>
            <ul id="department-list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                @foreach($departments as $department)
                <li class="nav-item">
                    <a class="nav-link {{$loop->iteration == 1? 'active':''}}" data-toggle="tab" onclick="openTab({{ $department->id }})" role="tab">{{ $department->name }}
                        <span class="badge pull-right">7</span>
                    </a> 
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        @foreach ($departments as $department)
        <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}} " id="tab{{$department->id}}" role="tabpanel">
            <h4 class="sub-header">{{$department->name}}
                <small> 
                    <a class="edit-toggle" href="#" data-toggle="tooltip" data-original-title="" title="" onclick="updateDepartment({{ $department->id }});">(Edit)</a> 
                </small> 
                {{-- <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this Department"></i> </a> --}}
                {!! Form::open([
                    'method'=>'DELETE',
                    'route' => ['departments.destroy', $department->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this Department"></i> ', array(
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger pull-right',
                            'title' => 'Delete this Department',
                            'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                {!! Form::close() !!} 
            </h4>
             <div class="form-horizontal form-striped compact department-details" id="department-div{{$department->id}}">
                <div class="form-group row">
                    <label class="col-md-3 control-label">Department name</label>
                    <div class="col-md-5"> <p class="form-control-static">{{$department->name}}</p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label ">Weekly working hours</label>
                    <div class="col-md-5"> <p class="form-control-static">{{$department->working_hour}}</p> </div>
                </div>                    
            </div>
            <form method="POST" action="{{ route('departments.update', $department->id)  }}" accept-charset="UTF-8" class="form-horizontal department-update-form" style="display:none" id="department-{{$department->id}}"  novalidate="novalidate">
                @csrf
                @method('PUT')
                <input name="department_id" type="hidden" value="{{$department->id}}">
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Department name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Department name" required="" minlength="2" name="name" type="text" value="{{$department->name}}">
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Weekly working hours
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Weekly working hours" required="" minlength="2" name="working_hour" type="text" value="{{$department->working_hour}}">
                    </div>
                </div>                    
                <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-default edit-cancel" onclick="cancelUpdate({{ $department->id  }});"><i class="fas fa-times"></i> Cancel</button>
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

    function openTab(id){
        $('.tab-pane').hide();
        $('#tab'+id).show();
        $(".department-update-form").hide();
        // $('#department'+id).attr('style', 'display:none !important');
        $('#department-div'+id).show();
    }
    function updateDepartment(id) {
        $('.department-details').hide();
        $('#department-'+id).show();
    }
    function cancelUpdate(id){
        $('#department-'+id).hide();
        $('#department-div'+id).show();
    }


  </script>
@endsection