@extends('layouts.admin.master')
@section('title', 'Recurring compensation types')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/office.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="row gutter30">
    <div class="col-md-4">
        <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Recurring compensation types</h4>
            <form method="POST" action="{{ route('recurring-compensation-types.store') }}" accept-charset="UTF-8" id="new_company_form" novalidate="novalidate">
                @csrf
                <div class="input-group input-group-sm"> 
                    <input class="form-control" placeholder="Recurring Compensation Types..." required="" minlength="2" name="name" type="text">
                    <span class="input-group-btn"> 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button> 
                    </span> 
                </div> 
            </form>
            <br>

            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                @foreach($recurringcompensationtypes as $recurringcompensationtype)
                    <li class="nav-item"> 
                    <a class="nav-link office-edit {{$loop->iteration == 1? 'active':''}}" serial="{{ $recurringcompensationtype->id }}" data-toggle="tab" onclick="openTab({{ $recurringcompensationtype->id }})" role="tab">{{ $recurringcompensationtype->name }}
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        @foreach ($recurringcompensationtypes as $recurringcompensationtype)
        <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}}" id="tab{{ $recurringcompensationtype->id }}" role="tabpanel">
            <h4 class="sub-header">
                <span class="office_name">{{ $recurringcompensationtype->name }}</span> 
                <small> 
                    <a href="#" class="edit-toggle"  onclick="updateOffice({{ $recurringcompensationtype->id }});" data-toggle="tooltip" data-original-title="" title="">(Edit)</a> 
                </small> 
                {!! Form::open([
                    'method'=>'DELETE',
                    'route' => ['recurring-compensation-types.destroy', $recurringcompensationtype->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> ', array(
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger pull-right',
                            'title' => 'Delete this office',
                            'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                {!! Form::close() !!} 
            </h4>

            <div class="form-horizontal form-striped compact office-details" id="office-div{{$recurringcompensationtype->id}}">

                <div class="form-group row">
                    <label class="col-md-3 control-label"> Name </label>
                    <div class="col-md-5"> 
                        <p class="form-control-static">
                            <span class="office_name">{{ $recurringcompensationtype->name }}</span>
                        </p> 
                    </div>
                </div>
            </div>
            {!! Form::model($recurringcompensationtype, [
                'method' => 'PATCH',
                'route' => ['recurring-compensation-types.update', $recurringcompensationtype->id],
                'class' => 'form-horizontal office-update-form',
                'id' => "office-$recurringcompensationtype->id",
                'files' => true,
                'novalidate' => 'novalidate',
                'style' => 'display:none'
            ]) !!}
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Recurring Compensation Types name" required="" minlength="2" name="name" type="text" value="{{ $recurringcompensationtype->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-default edit-cancel" onclick="cancelUpdate({{ $recurringcompensationtype->id }});"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
                    
        @endforeach
    </div>
</div>
@endsection
@section('admin-additional-js')
 <script type="text/javascript">

    function openTab(id){
        $('.tab-pane').hide();
        $('.office-update-form').hide();
        $('#tab'+id).show();
        $('#office-div'+id).show();
    }
    function updateOffice(id) {
        $('.office-details').hide();
        $('#office-'+id).show();
    }
    function cancelUpdate(id){
        $('#office-'+id).hide();
        $('#office-div'+id).show();
    }
  </script>
@endsection