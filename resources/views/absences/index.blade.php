@extends('layouts.admin.master')
@section('title', 'Absences')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
<link href="{{ asset('admin/css/absence.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="shadowed-box">
    <div class="full">
        <div class="row gutter30">                
            <div class="col-md-4">
                <div class="block-section customvtab vtabs row">
                    <h4 class="sub-header">Absence</h4>
                    <form method="POST" action="{{ route('absences.store') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                    @csrf
                    <div class="input-group input-group-sm"> 
                        <input class="form-control" placeholder="Absence Name..." name="name" required="" minlength="2"  type="text"> 
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                            </button> 
                        </span> 
                    </div> 
                    </form>
                    <br>
                    <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                        @foreach($absences as $item) 
                        <li class="nav-item">
                            <a class="nav-link {{$loop->iteration == 1? 'active':''}}" data-toggle="tab" onclick="openTab({{ $item->id }})"  role="tab">
                                <i class="fas fa-sort"></i> 
                                {{ $item->name  }}
                            </a> 
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 tab-content">
                @foreach ($absences as $absence)
                <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}}" id="tab{{ $absence->id }}" role="tabpanel">
                <h4 class="sub-header">General Settings
                    <small> 
                        <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="updateOffice({{ $absence->id }});">(Edit)</a> 
                    </small> 
                    {{-- <a href="#modal-delete-office" data-toggle="modal"> 
                        <i class="fas fa-trash pull-right" data-toggle="tooltip " title="" data-original-title="Delete this office"></i> 
                    </a> --}}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['absences.destroy', $absence->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fas fa-trash"></i> ', array(
                                'type' => 'submit',
                                'class' => 'pull-right',
                                'title' => 'Delete this Absence',
                                'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                    {!! Form::close() !!}
                </h4>
                <div class="form-horizontal form-striped compact absence-details" id="absence-div{{$absence->id}}">
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-6 form-control-static">{{ $absence->name }}</div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Color</label>
                        <div class="col-md-8 form-control-static">
                            {{ $absence->color }}
                            <span class="fas fa-square" style="color: {{ $absence->color }}"></span>
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Enable half-day requests?</label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->is_halfday_request == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">
                            Certificate required?
                        </label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->certificate_required == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">
                            Substitute required?
                            <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Employees can select a substitute when requesting absence. After the substitute has approved the request, the substitution is displayed in the calendar. Please note: No access rights or approvals are transferred to the substitute."></i>
                        </label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->is_substituting == 2)
                                {{ 'Yes' }}
                            @elseif($absence->is_substituting == 1)
                                {{ 'Optional' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">
                            Allow employees substituting for someone to request this absence:
                        </label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->is_employee_substituting_absence == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>
                    <h4 class="sub-header">
                        Validity Settings
                    </h4>
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Valid on</label>
                        <div class="col-md-6 form-control-static">
                            {{ $absence->valid_on }}
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">
                            Consider attendance days during absence period as overtime?
                        </label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->is_absence_period_as_overtime == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>

                    <h4 class="sub-header">
                        Accrual Settings
                    </h4>
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">
                            Enable accrual policies?
                            <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Build accruals for this absence type based on rules you define below"></i>
                        </label>
                        <div class="col-md-6 form-control-static">
                            @if($absence->is_accrual_policies == 1)
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </div>
                    </div>
                    @if($absence->is_accrual_policies == 1)
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Accrual carryover from previous year
                            </label>
                            <div class="col-md-6 form-control-static">
                                {{ $absence->carryover_type }}
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Carryover limit
                            </label>
                            <div class="col-md-6 form-control-static">
                                {{ $absence->carryover_date }}
                            </div>
                        </div>
                    @endif
                </div>
            {{-- <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal form-striped time-off-type-form" id="absense{{ $absence->id }}" novalidate="novalidate"> --}}
            {!! Form::model($absence, [
                'method' => 'POST',
                'route' => ['absence.update', $absence->id],
                'class' => 'form-horizontal absence-update-form',
                'id' => "absence-$absence->id",
                'files' => true,
                'novalidate' => 'novalidate',
                'style' => 'display:none'
            ]) !!}
                    <div class="form-group d-flex d-flex">
                        <label class="col-md-3 control-label">
                        Name
                        </label>
                        <div class="col-md-6">
                            <input class="form-control valid" name="name" placeholder="Absence type name" required="" minlength="2"  type="text" value="{{ $absence->name }}">
                        </div>
                    </div>
                    <div class="form-group d-flex">
                    <label class="col-md-3 control-label">
                        Color
                    </label>
                    <div class="col-md-2">
                        <input type="text" name="color" class="colorpicker form-control" value="{{ $absence->color }}" />
                    </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                        Enable half-day requests?
                        </label>
                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input name="is_halfday_request" type="radio" value="1" @isset($absence->is_halfday_request) @if($absence->is_halfday_request == 1) checked @endif @endisset> Yes
                                </label>
                            </div>
                            <div class="col-xs-2">
                                <label class="radio-inline" >
                                    <input name="is_halfday_request" type="radio" value="0" @isset($absence->is_halfday_request) @if($absence->is_halfday_request == 0) checked @endif @endisset> No
                                </label>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Certificate required?
                        </label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-4 col-md-8 col-lg-7 form-inline">
                                    <label class="radio-inline">
                                        <input name="certificate_required" type="radio" value="1" @isset($absence->certificate_required) @if($absence->certificate_required == 1) checked @endif @endisset>
                                        From the
                                    </label>
                                    <input class="form-control required number valid" name="required_days" style="display: inline-block; width: 55px;" min="0" step="0.5"  type="number" value="2.0">
                                        day on
                                </div>
                                <div class="col-sm-8 col-md-4 col-lg-5">
                                    <label class="radio-inline">
                                        <input name="certificate_required" type="radio" value="0" @isset($absence->certificate_required) @if($absence->certificate_required == 0) checked @endif @endisset> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Substitute required?
                            <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Employees can select a substitute when requesting absence. After the substitute has approved the request, the substitution is displayed in the calendar. Please note: No access rights  or approvals are transferred to the substitute."></i>
                        </label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-2">
                                    <label class="radio-inline" >
                                        <input type="radio" name="is_substituting" value="2" @isset($absence->is_substituting) @if($absence->is_substituting == 2) checked @endif @endisset> Yes
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline">
                                        <input name="is_substituting" type="radio" value="0" @isset($absence->is_substituting) @if($absence->is_substituting == 0) checked @endif @endisset> No
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline" >
                                        <input type="radio" value="1" name="is_substituting" @isset($absence->is_substituting) @if($absence->is_substituting == 1) checked @endif @endisset> Optional
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Allow employees substituting for someone to request this absence:
                        </label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-2">
                                    <label class="radio-inline">
                                        <input name="is_employee_substituting_absence" type="radio" value="1" @isset($absence->is_employee_substituting_absence) @if($absence->is_employee_substituting_absence == 1) checked @endif @endisset> Yes
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline">
                                        <input name="is_employee_substituting_absence" type="radio" value="0" @isset($absence->is_employee_substituting_absence) @if($absence->is_employee_substituting_absence == 0) checked @endif @endisset> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="sub-header">
                        Validity Settings
                    </h4>

                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Valid on
                        </label>
                        <div class="col-md-6">
                            <select class="form-control days-applicable-select" name="valid_on">
                                @foreach($valid_datas as $key => $value)
                                    <option value="{{ $key }}"  @isset($absence->valid_on) @if($value == $absence->valid_on) selected @endif @endisset>
                                        {{ $value }}
                                    <option>
                                @endforeach
                            </select>
                            {{-- <p class="boxs" id="5workdays">
                                Absence days are calculated based on the intersecting days of the work schedule and the days on which the absence type is valid.
                            </p>
                            <p class="boxs" id="Work1">
                                Absence days are calculated based on the intersecting days of the work schedule and the days on which the absence type is valid.
                            </p>
                            <p class="boxs" id="work2">
                                Absence days are calculated based on the settings of the work schedule. Holidays are included in the absence balance calculation.
                            </p>
                            <p class="boxs" id="work3">
                                Absence days are calculated based on the settings of the work schedule. Holidays are not considered in the absence balance calculation.
                            </p>
                            <p class="boxs" id="Work4">
                                Absence days are calculated Monday through Sunday; the settings of the work schedule are ignored.
                            </p> --}}
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Consider attendance days during absence period as overtime?
                        </label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-2">
                                    <label class="radio-inline" >
                                        <input name="is_absence_period_as_overtime" type="radio" value="1" @isset($absence->is_absence_period_as_overtime) @if($absence->is_absence_period_as_overtime == 1) checked @endif @endisset> Yes
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline" >
                                        <input name="is_absence_period_as_overtime" type="radio" value="0" @isset($absence->is_absence_period_as_overtime) @if($absence->is_absence_period_as_overtime == 0) checked @endif @endisset> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="sub-header">
                        Accrual Settings
                    </h4>
                    <div class="form-group d-flex">
                        <label class="col-md-3 control-label">
                            Enable accrual policies?
                            <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Build accruals for this absence type based on rules you define below"></i>
                        </label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-2">
                                    <label class="radio-inline check-type" id="yes" value="">
                                        <input name="is_accrual_policies" type="radio" value="1" @isset($absence->is_accrual_policies) @if($absence->is_accrual_policies == 1) checked @endif @endisset> Yes
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline check-type" id="no">
                                        <input name="is_accrual_policies" type="radio" value="0" @isset($absence->is_accrual_policies) @if($absence->is_accrual_policies == 0) checked @endif @endisset> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carryover-type" style="display: none;">
                        <div class="form-group d-flex " >
                            <label class="col-md-3 control-label">
                                Accrual carryover from previous year
                            </label>
                            <div class="col-md-6">
                                <select class="form-control carryover_type" name="carryover_type">
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key }}" @isset($absence->carryover_type) @if($absence->carryover_type == $key) selected @endif @endisset>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="boxs" id="limited">
                            <div class="form-group d-flex accruals-dependant carryover-dependant">
                                <label class="col-md-3 control-label">
                                    Carryover limit
                                </label>
                                <div class="col-md-6">
                                <input class="form-control input-datepicker-close required" placeholder="DD.MM" autocomplete="off" data-date-format="dd.mm" date-value="1900-01-01" type="text" value="{{ $absence->carryover_date }}" name="carryover_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-md-9 offset-3">
                            <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible1();"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                        </div>
                    </div>
                </form>
                    {{-- <div id="time_off_accrual_policies161782" class="panel-group personio-panel-group margin-top-20">
                        <div class="panel panel-default" >
                        <div class="panel-heading">
                            <div class="heading-text">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#accrual_policy114333">
                                    <i class="fas arrow js-absence-collapse-arrow fa-angle-right"></i>
                                </a>
                                <div>
                                    <a href="#accrual_policy114333" class="absence-policy-title accordion-toggle collapsed display-block" data-toggle="collapse" data-parent="#time_off_accrual_policies161782">
                                        24 days
                                    </a>
                                    <span class="absence-policy-subtitle display-block">
                                        Active for 20 Employees
                                    </span>
                                </div>
                                </div>
                                <div class="heading-buttons">
                                <div data-toggle="tooltip" title="" data-original-title="Archive absence policy">
                                    <button class="btn btn-default" href="#modal-archive-time-off-policy" data-toggle="modal" data-time-off-policy-id="114333" >
                                        <i class="fas fa-archive"></i>
                                    </button>
                                </div>            
                            </div>
                        </div>

                        <div id="accrual_policy114333" class="panel-collapse js-absence-policy-collapsable collapse" style="height: 0px;">
                            <div class="panel-body">
                                    <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle"></i>
                                        This policy cannot be changed or deleted as it is assigned to at least one employee or an absence entitlement bases on it. To change an employee’s entitlement settings please create a new policy.
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <h4 class="sub-header">
                                        Basic Information
                                    </h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-horizontal form-striped compact">
                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">Number of days granted</label>
                                            <div class="col-md-6 form-control-static">24 days</div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">Grant entitlement every</label>
                                            <div class="col-md-6 form-control-static">Year</div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">Entitlement granted at</label>
                                            <div class="col-md-6 form-control-static">Beginning of the year</div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">Enable waiting time?</label>
                                            <div class="col-md-6 form-control-static">No</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="sub-header">
                                        Prorated Calculation
                                    </h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-horizontal form-striped compact">
                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">Beginning of employment</label>
                                            <div class="col-md-6 form-control-static">Monthly prorated</div>
                                        </div>

                                        <div class="form-group d-flex">
                                            <label class="col-md-3 control-label">End of employment</label>
                                            <div class="col-md-6 form-control-static">Monthly prorated</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <div class="heading-text">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#accrual_policy114334">
                                        <i class="fas fa-angle-right arrow js-absence-collapse-arrow"></i>
                                    </a>
                                    <div>
                                        <a href="#accrual_policy114334" class="absence-policy-title accordion-toggle collapsed display-block" data-toggle="collapse" data-parent="#time_off_accrual_policies161782">
                                            Working Students
                                        </a>
                                        <span class="absence-policy-subtitle display-block">
                                            Active for 1 Employees
                                        </span>
                                    </div>
                                </div>
                                <div class="heading-buttons">
                                    <div data-toggle="tooltip" title="" data-original-title="Archive absence policy">
                                    <button class="btn btn-default" href="#modal-archive-time-off-policy" data-toggle="modal" data-time-off-policy-id="114334" >
                                        <i class="fas fa-archive"></i>
                                    </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="accrual_policy114334" class="panel-collapse collapse js-absence-policy-collapsable" style="height: 0px;">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle"></i>
                                                This policy cannot be changed or deleted as it is assigned to at least one employee or an absence entitlement bases on it. To change an employee’s entitlement settings please create a new policy.
                                            </div>
                                    </div>            
                                    <div class="col-md-12">
                                        <h4 class="sub-header">
                                            Basic Information
                                        </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-horizontal form-striped compact">
                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Number of days granted</label>
                                                <div class="col-md-6 form-control-static">1 days</div>
                                            </div>

                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Grant entitlement every</label>
                                                <div class="col-md-6 form-control-static">Month</div>
                                            </div>

                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Entitlement granted at</label>
                                                <div class="col-md-6 form-control-static">Beginning of the month</div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Enable waiting time?</label>
                                                <div class="col-md-6 form-control-static">No</div>
                                            </div>

                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="sub-header">
                                            Prorated Calculation
                                        </h4>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-horizontal form-striped compact">
                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Beginning of employment</label>
                                                <div class="col-md-6 form-control-static">Daily prorated</div>
                                            </div>

                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">End of employment</label>
                                                <div class="col-md-6 form-control-static">Monthly prorated</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @endforeach 
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/jquery-asColor/dist/jquery-asColor.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>  
<script>
    // function switchVisible() {
    //     if (document.getElementById('office-div')) {

    //         if (document.getElementById('office-div').style.display == 'none') {
    //             document.getElementById('office-div').style.display = 'block';
    //             document.getElementById('office').style.display = 'none';
    //         }
    //         else {
    //             document.getElementById('office-div').style.display = 'none';
    //             document.getElementById('office').style.display = 'block';
    //         }
    //     }
    // }

    function openTab(id){
        $('.tab-pane').hide();
        $('.absence-update-form').hide();
        $('#tab'+id).show();
        // $('#office'+id).attr('style', 'display:none !important');
        $('#absence-div'+id).show();
    }
    function updateOffice(id) {
        $('.absence-details').hide();
        $('#absence-'+id).show();
    }
    function cancelUpdate(id){
        $('#absence-'+id).hide();
        $('#absence-div'+id).show();
    }

    $(document).ready(function() {
        $('.select-chosen').select2();
    
    });

    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // $(document).ready(function(){
    //     $("select").change(function(){
    //         $(this).find("option:selected").each(function(){
    //             var optionValue = $(this).attr("value");
    //                 $(".boxs").hide();
    //                 $("#"+optionValue).show();
    //         });
    //     }).change();
    // });

    // $("#no").click(function(){
    //     $(".carryover-type").hide();
    // });
    // $("#yes").click(function(){
    //     $(".carryover-type").show();
    // });


    $(document).on('change', '.carryover_type',  function () {
        var data = $(this).val();
        console.log(data);
        if(data == 'limited'){
            $(".boxs").show(500);
        }else{
            $(".boxs").hide(500);
        }
    });

    var check_type = $("input[name='is_accrual_policies']:checked").val();
    console.log(check_type);
    if (check_type == 0) {
        $(".carryover-type").hide();
        $(".boxs").hide(500);
    } else {
        $(".carryover-type").show();
        $(".boxs").hide(500);
    }

    $(document).on('click','#no', function() {
         $(".carryover-type").hide();
         $(".boxs").hide(500);
    });

    $(document).on('click','#yes', function() {
        $(".carryover-type").show();
        $(".boxs").hide(500);
    });

  </script>
@endsection