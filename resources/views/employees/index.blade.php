@extends('layouts.admin.master')
@section('title', 'Employees')
@section('admin-additional-css')
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
<!-- Bootstrap Core CSS -->
 <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
 <link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
 <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
            <div class="row">
                <div class="col-md-5">
                <div id="staff_table_filter" class="dataTables_filter-1">
                    <label class="staff-table-filter-label">
                        <div class="input-group">
                        <input type="search" class="form-control table-search" placeholder="Search" aria-controls="staff_table" value="">
                            <span class="input-group-btn">
                                <button id="search-button" class="btn btn-default" type="button">
                                    <i class="ti-search"></i>
                                </button>
                            </span>
                        </div>
                    </label>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-toolbar pull-left">
                        <div class="btn-group" data-toggle="tooltip" data-original-title="Save default view for all employees">
                            <a href="#modal-add-default-employee-view" data-toggle="modal" class="btn btn-default">
                                <i class="fas fa-users"> </i>
                            </a>                                      
                        </div>
                    </div>
                    <div class="btn-group" data-toggle="tooltip" data-original-title="Save current view">
                        <div id="staff-views" class="btn-group dropdown">
                            <button class="btn btn-default dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Views
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="staff-views">
                                <li class="divider"></li>
                                    <li>
                                    <a href="#">Return to default view
                                    </a>
                                </li>
                            </ul>
                            <div id="bulk-actions" class="btn-group dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="bulk-actions">
                                    <li>
                                        <a href="javascript:void(0)" data-action="change-attribute">Edit attribute</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-action="edit-role">Add or remove role</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-action="accrual-policy">Change accrual policy</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-action="assign-working-hour-schedule">Assign or remove work schedule</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-action="invite">Send invitation email</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-action="delete-employee">Delete employee/s</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="col-md-3">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                        <a href="#" class="btn btn-default active" data-toggle="tooltip" data-original-title="Employee list"><i class="fa fa-list"></i>
                        </a>
                            <a href="#" class="btn btn-default " data-toggle="tooltip" data-original-title="Orgchart view"><i class="mdi mdi-sitemap"></i></a>
                            <a href="#" class="btn btn-default " data-toggle="tooltip" data-original-title="Timeline view"><i class="fas fa-calendar"></i></a>
                        </div>
                        <div class="btn-group" data-original-title="Add employee" >      <a  data-toggle="modal" data-target=".bd-example-modal-lg"  class=" btn btn-default"><i class=" fas fa-user-plus"></i></a>
                        </div>

                        <div class="btn-group">
                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle" data-test-id="employeeheader-actionbutton">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#"><i class="fas fa-upload"></i> Import</a></li>
                                <li><a href="#modal-export" data-toggle="modal"><i class="fas fa-download"></i> Export</a></li>
                                <li class="divider"></li>
                                <li><a class="customize-columns-trigger" href="#modal-customize-columns">Customize columns</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                
                                <h4 class="modal-title text-left">Add new employee</h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Stepper -->
                                    <div class="steps-form">
                                        <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                                            @foreach ($sections as $section)
                                            <div class="steps-step">
                                                <a href="#step-{{ $loop->iteration }}" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect {{ $loop->iteration == 1? 'active btn-amber':'' }}" data-toggle="tooltip" data-placement="top" title="Personal Data">{{ $loop->iteration }}. {{ $section->name }}</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- First Step -->
                                    <form  role="form" action="" method="post">
                                        @foreach ($sections as $section)
                                            <div class=" setup-content-2" id="step-{{ $loop->iteration }}">
                                                <div class="card-body">
                                                    {{-- <form action="#" class="form-horizontal form-bordered"> --}}
                                                    <div class="form-body">
                                                        @foreach ($section->employeeDetailAttributes as $attribute)
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">{{$attribute->name}}</label>
                                                            <div class="col-md-6">
                                                                @if($attribute->dataTypes->key == 0)
                                                                <input type="text" name="value[{{$attribute->id}}]" placeholder="{{$attribute->name}}" class="form-control">
                                                                @elseif($attribute->dataTypes->key == 1)
                                                                <select class="form-control select2 custom-select" name="value[{{$attribute->id}}]">
                                                                    @foreach ($attribute->dataTypes->attributeOptions as $option)
                                                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @elseif($attribute->dataTypes->key == 4)
                                                                <div class="input-group">
                                                                    <input type="text" name="value[{{$attribute->id}}]" class="form-control date" id="date-{{$attribute->id}}" data-date="{{$attribute->id}}" placeholder="dd/mm/yyyy">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text date-calendar" id=""><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                @elseif($attribute->dataTypes->key == 7)
                                                                <select class="js-example-disabled-results select multiple form-control" name="value[{{$attribute->id}}]">
                                                                    @foreach ($attribute->dataTypes->attributeOptions as $option)
                                                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        {{-- <div class="form-group row">
                                                            <label class="control-label col-md-2">First Name*</label>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="First Name" class="form-control">
                                                                <small class="form-control-feedback"> This is inline help </small>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label  col-md-2">Gender</label>
                                                                <div class="col-md-2">
                                                                    <select class="form-control custom-select">
                                                                        <option value="">Male</option>
                                                                        <option value="">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email2" class="control-label  col-md-2">Email*</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="somebody@yourcompany.com">
                                                                    <div class="input-group-append">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Office</label>
                                                            <div class="col-md-6">
                                                                <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                </select>                      
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Department</label>
                                                            <div class="col-md-6">
                                                                <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                </select>                      
                                                            </div>
                                                        </div>   
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">Position</label>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Senior Marketing Manager, Managing Director, ..." class="form-control">                                                         
                                                            </div>
                                                        </div>                                    
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Account</label>
                                                            <div class="col-md-10">
                                                                <label class="control-label" title="">
                                                                    <input class="checkbox-1" name="invited" type="checkbox" value="false">Create  login and send invitation email</label>
                                                                </div>
                                                            </div>                                    
                                                        </div> --}}
                                                    {{-- </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class=" setup-content-2" id="step-1">
                                            <div class="card-body">
                                                <form action="#" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-2">First Name*</label>
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="First Name" class="form-control">
                                                            <small class="form-control-feedback"> This is inline help </small>
                                                        </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">Last Name*</label>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Last Name" class="form-control">
                                                                <small class="form-control-feedback"> This is inline help </small> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Gender</label>
                                                            <div class="col-md-2">
                                                                <select class="form-control custom-select">
                                                                    <option value="">Male</option>
                                                                    <option value="">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="form-group row">
                                                        <label for="email2" class="control-label  col-md-2">Email*</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="somebody@yourcompany.com">
                                                                <div class="input-group-append">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label class="control-label  col-md-2">Office</label>
                                                        
                                                        <div class="col-md-6">
                                                            <select class="js-example-disabled-results  custom-select form-control ">
                                                            <option value="one">First</option>
                                                            <option value="two">Second </option>
                                                            <option value="three">Third</option>
                                                            <option value="one">First</option>
                                                            <option value="two">Second </option>
                                                            <option value="three">Third</option>
                                                            </select>                      
                                                        </div>
                                                    
                                                        </div> 

                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Department</label>
                                                        
                                                        <div class="col-md-6">
                                                            <select class="js-example-disabled-results  custom-select form-control ">
                                                            <option value="one">First</option>
                                                            <option value="two">Second </option>
                                                            <option value="three">Third</option>
                                                            <option value="one">First</option>
                                                            <option value="two">Second </option>
                                                            <option value="three">Third</option>
                                                            </select>                      
                                                        </div>
                                                    
                                                        </div>   
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">Position</label>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Senior Marketing Manager, Managing Director, ..." class="form-control">                                                         
                                                            </div>
                                                        </div>                                    
                                                        
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Account</label>
                                                            <div class="col-md-10">
                                                                
                                                                    <label class="control-label" title="">
                                                                        <input class="checkbox-1" name="invited" type="checkbox" value="false">Create  login and send invitation email</label>
                                                                
                                                            </div>
                                                        </div>                                    
                                            
                                                </div>
                                                
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Second Step -->
                                        <div class="row setup-content-2" id="step-2">
                                            <div class="card-body">
                                                <form action="#" class="form-horizontal form-bordered">
                                                    <div class="form-body">
                                                        
                                                    <div class="form-group row">
                                                            <label class="control-label  col-md-2">
                                                                Hire date <i class="fas fa-info-circle "></i>
                                                            </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                            <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <i class="fas fa-calendar"></i>
                                                                </span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                    <label class="control-label  col-md-2">Department</label>
                                                                
                                                                <div class="col-md-6">
                                                                    <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    </select>                      
                                                                </div>
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">
                                                            Contract ends
                                                            </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                            <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <i class="fas fa-calendar"></i>
                                                                </span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Employment type</label>  
                                                            <div class="col-md-6">
                                                                    <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    </select>                      
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Supervisor</label>  
                                                            <div class="col-md-6">
                                                                    <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    </select>                      
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="weeklyHours" class="col-md-2 control-label">Weekly hours</label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <input name="weeklyHours" type="number" class="form-control" value="11">
                                                                    <span class="input-group-addon">/40</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Cost center</label>
                                                            <div class="col-md-6">
                                                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                                            <option value="AL">Alabama</option>
                                                            
                                                            <option value="WY">Wyoming</option>
                                                            </select>
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="weeklyHours" class="col-md-2 control-label">Weekly hours</label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <input name="weeklyHours" type="number" class="form-control" value="11">
                                                                    <span class="input-group-addon">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    
                                                    
                                                    </div>
                                                
                                                </form>
                                            </div>                                    

                                        </div>
                                        <!-- Third Step -->
                                        <div class="row setup-content-2" id="step-3">
                                            <div class="">
                                                <div class="col-md-12">                                                  
                                                    <form id="demoform" action="#" method="post">
                                                        <select multiple="multiple" size="10" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
                                                            <option value="option1">Accounting</option>
                                                            <option value="option2">Management</option>
                                                            <option value="option3" selected="selected">Administrator</option>
                                                            <option value="option4">Office Management</option>
                                                            <option value="option5">Recruiting Manager</option>
                                                            <option value="option6" selected="selected">Working Student</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fourth Step -->
                                        <div class="row setup-content-2" id="step-4">
                                            <div class="card-body">
                                                <form action="#" class="form-horizontal form-bordered">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Onboarding Template</label>        
                                                            <div class="col-md-6">
                                                                <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                </select>                      
                                                            </div>                                               
                                                        </div>
                                    
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Working Schedule</label>  
                                                            <div class="col-md-6">
                                                                <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                </select>                      
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-2">Since when? </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2">
                                                                            <i class="fas fa-calendar"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label  col-md-2">Supervisor</label>  
                                                            <div class="col-md-6">
                                                                <select class="js-example-disabled-results  custom-select form-control ">
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                    <option value="one">First</option>
                                                                    <option value="two">Second </option>
                                                                    <option value="three">Third</option>
                                                                </select>                      
                                                            </div>
                                                        </div>
                                                    </div>                                   
                                                </form>
                                            </div> 
                                        </div> --}}
                                    </form>           
                                </div>
                                <div class="modal-footer">
                                    <div class="form-actions">
                                        <button type="button" data-dismiss="modal" class="btn btn-default ">Cancel</button>
                                        <button type="button" class="btn btn-primary text-right">Next</button>
                                    </div>
                                </div>

                            </div>
                        </div>  
                    </div> 
                    </div>
            </div>
            <div class=" table-responsive m-t-40">
                <section class="filters well">
                    <fieldset class="row">
                        <div class="filters-list">Filters list</div>
                        <div class="Filter-button">
                            <div class="form-group">          
                            <select id="grade" name="grade">
                            <option value="-1"><button>Status</button></option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="">1</option>
                            <option value="">-1</option>
                            <option value="-2">-2</option>
                            <option value="-3">-3</option>
                            <option value="-4">-4</option>
                            <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>
                        <div class="Filter-button">
                            <div class="form-group">
                            
                            <select id="two_grade" name="two_grade">
                                <option value="2"><button>Employment type</button></option>
                                <option value="3"></option>
                                <option value="">2</option>
                                <option value="1">1</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                                <option value="-3">-3</option>
                                <option value="-4">-4</option>
                                <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>
                        <div class="Filter-button">        
                            <div  class="form-group">    
                                <select id="tree_grade " name="tree_grade">
                                <option value="1"><button>Office</button></option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                                <option value="-3">-3</option>
                                <option value="-4">-4</option>
                                <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>
                        <div class="Filter-button">        
                            <div  class="form-group">    
                                <select id="grade-4" name="grade-4">
                                <option value="1"><button>Office</button></option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                                <option value="-3">-3</option>
                                <option value="-4">-4</option>
                                <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>
                        <div class="Filter-button">        
                            <div  class="form-group">    
                                <select id="grade-5 " name="grade-5">
                                <option value="1"><button>Office</button></option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                                <option value="-3">-3</option>
                                <option value="-4">-4</option>
                                <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>
                        <div class="Filter-button">        
                            <div  class="form-group">    
                                <select id="grade-6" name="grade-6">
                                <option value="1"><button>Office</button></option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                                <option value="-3">-3</option>
                                <option value="-4">-4</option>
                                <option value="-5">-5</option>
                            </select>
                            </div>
                        </div>                  
                    </fieldset> 
                </section>
                <section class="data">   
                    <table id="example" class="display datatable table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                        <thead>
                            <tr>
                                <th class="table-topper"><input type="checkbox"></th>
                                <th style="left: 37px;" class="table-topper"></th>
                                @foreach ($attributes as $attribute)
                                <th class="table-topper">{{ $attribute->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td style="left: 37px;"> <img src="../assets/images/users/4.jpg" alt="user" width="40"
                                    class="img-circle" />
                                </td>
                                @foreach ($attributes as $attribute)
                                @php
                                    $detail = $employee->employeeDetails()->where('attribute_id', $attribute->id)->first();
                                @endphp
                                <td>{{ $detail->value ?? '' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
@endsection
                                                       
@section('admin-additional-js')
{{-- /home/salman/Projects/payroll-v2/public/admin/assets/plugins/daterangepicker/moment.min.js --}}
{{-- <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('admin/assets/plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="{{ asset('admin/js/jquery.bootstrap-duallistbox.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script> --}}

<script src="{{ asset('admin/js/main.js') }}"></script>

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

    // var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    // $("#demoform").submit(function() {
    //     alert($('[name="duallistbox_demo1[]"]').val());
    //     return false;
    // });
    // var demo2 = $('.demo2').bootstrapDualListbox({
    //     nonSelectedListLabel: 'Non-selected',
    //     selectedListLabel: 'Selected',
    //     preserveSelectionOnMove: 'moved',
    //     moveOnSelect: false,
    //     nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
    // });
    // // Material Select Initialization

    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });
    // var $disabledResults = $(".js-example-disabled-results");
    // $disabledResults.select2();
    // var select2Init = function(){
    //     $('select').select2({
    //         dropdownAutoWidth : true,
    //         allowClear: true,
    //         placeholder: "Select a grade",
    //     });
    // };
    (function($){  
        var dataTable;
        var select2Init = function(){
            $('select').select2({
                dropdownAutoWidth : true,
                allowClear: true,
                placeholder: "Select a grade",
            });
        };
        var dataTableInit = function(){
            dataTable = $('table').dataTable({
                "columnDefs" : [{
                    "targets": 2,
                    "type": 'num',
                },{
                    "targets": 3,
                    "type": 'num',
                }],
            });
        }; 
        var dtSearchInit = function(){
            $('#grade').change(function(){
                dtSearchAction( $(this) , 2)
            });
            $('#two_grade').change(function(){
                dtSearchAction( $(this) , 3);
            });
            $('#tree_grade').change(function(){
                dtSearchAction( $(this) , 4);
            });
        }; 
    
        dtSearchAction = function(selector,columnId){
            var fv = selector.val();
            if( (fv == '') || (fv == null) ){
                dataTable.api().column(columnId).search('', true, false).draw();
            } else {
                dataTable.api().column(columnId).search(fv, true, false).draw();
            }
        };
        $(document).ready(function(){
            $('.custom-select').select2();
            var id = '';
            $('.date, .date-calendar').on('focus',function() {
                id = $(this).data('date');
            });
            $('.date, .date-calendar').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": false,
                "linkedCalendars": false,
                "autoUpdateInput": false,
                "alwaysShowCalendars": false,
                "showCustomRangeLabel": false,
                "format": "DD/MM/YYYY"
            }, function(start, end, label) {
                $('#date-'+id).val(start.format('DD/MM/YYYY'));
            });
            select2Init();
            dataTableInit();
            dtSearchInit();
        });
    })(jQuery);
</script>
@endsection
</body>

</html>