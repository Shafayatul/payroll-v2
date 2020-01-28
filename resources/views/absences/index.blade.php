@extends('layouts.admin.master')
@section('title', 'Offices')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
<link href="{{ asset('admin/css/absence.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="shadowed-box">
        <div class="full">
            <h2 class="text-bold">Public Holidays</h2>  
            <div class="row gutter30">                
            <div class="col-md-4">
            <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Absence</h4>
            <form method="POST" action="" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                <div class="input-group input-group-sm"> <input class="form-control" placeholder="New office..." required="" minlength="2"  type="text"> <span class="input-group-btn"> <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button> </span> </div> </form><br>
            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist"> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab1" role="tab"><i class="fas fa-sort"></i> Paid vacation</a> </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" role="tab"><i class="fas fa-sort"></i> Paid vacation</a> </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><i class="fas fa-sort"></i> Paid vacation</a> </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4" role="tab"><i class="fas fa-sort"></i> Paid vacation</a> </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5" role="tab"><i class="fas fa-sort"></i> Paid vacation</a> </li>
            </ul>
            </div>
        </div>
        <div class="col-md-8 tab-content">
                <div class="block-section tab-pane active" id="tab1" role="tabpanel">
                <h4 class="sub-header">General Settings<small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible1();">(Edit)</a> </small> <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip " title="" data-original-title="Delete this office"></i> </a>
                </h4>
                    <div class="form-horizontal form-striped compact" id="office-div1">
                    
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6 form-control-static">Paid vacation</div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">Color</label>
                            <div class="col-md-8 form-control-static">
                                #04b404
                                <span class="fas fa-square" style="color: #04b404"></span>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">Enable half-day requests?</label>
                            <div class="col-md-6 form-control-static">Yes</div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Certificate required?
                            </label>
                            <div class="col-md-6 form-control-static">
                                No
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Substitute required?
                                <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Employees can select a substitute when requesting absence. After the substitute has approved the request, the substitution is displayed in the calendar. Please note: No access rights or approvals are transferred to the substitute."></i>
                            </label>
                            <div class="col-md-6 form-control-static">
                                Optional
                                </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Allow employees substituting for someone to request this absence:
                            </label>
                            <div class="col-md-6 form-control-static">
                                No
                            </div>
                        </div>
                        <h4 class="sub-header">
                            Validity Settings
                        </h4>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">Valid on</label>
                            <div class="col-md-6 form-control-static">Work Schedule on Mon-Fri</div>
                        </div>

                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Consider attendance days during absence period as overtime?
                            </label>
                            <div class="col-md-6 form-control-static">
                                Yes
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
                                Yes
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Accrual carryover from previous year
                            </label>
                            <div class="col-md-6 form-control-static">
                                Limited carryover
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-4 control-label">
                                Carryover limit
                            </label>
                            <div class="col-md-6 form-control-static">
                                31.03
                            </div>
                        </div>

                </div>
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal form-striped time-off-type-form" id="office1" novalidate="novalidate">
                            <div class="form-group d-flex d-flex">
                                <label class="col-md-3 control-label">
                                Name
                                </label>
                                <div class="col-md-6">
                                <input class="form-control valid" placeholder="Absence type name" required="" minlength="2"  type="text" value="Sick days">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Color
                            </label>
                            <div class="col-md-2">
                                    <input type="text" class="colorpicker form-control" value="#7ab2fa" />
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
                                            <input checked="checked"  type="radio" value="1"> Yes
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="radio-inline" >
                                            <input  type="radio" value="0"> No
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
                                                    <input checked="checked"  type="radio" value="1">
                                                    From the
                                                </label>
                                                <input class="form-control required number valid" style="display: inline-block; width: 55px;" min="0" step="0.5"  type="number" value="2.0">
                                                    day on
                                            </div>
                                            <div class="col-sm-8 col-md-4 col-lg-5">
                                                <label class="radio-inline">
                                                    <input  type="radio" value="0"> No
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
                                                <input type="radio" value="2"> Yes
                                            </label>
                                        </div>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input checked="checked" type="radio" value="0"> No
                                            </label>
                                        </div>
                                        <div class="col-xs-2">
                                            <label class="radio-inline" >
                                                <input type="radio" value="1"> Optional
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
                                                        <input checked="checked"  type="radio" value="1"> Yes
                                                    </label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="radio-inline">
                                                        <input type="radio" value="0"> No
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
                                            <select class="form-control days-applicable-select">
                                                <option value="">Please select...</option>
                                                <option value="5workdays">Work Schedule on Mon-Fri</option>
                                                <option value="Work1">Work Schedule on Mon-Sat</option>
                                                <option value="work2">Work Schedule, incl. Holidays</option>
                                                <option value="work3">Work Schedule, excl. Holidays</option>
                                                <option value="Work4">Mon-Sun</option>
                                            </select>
                                            <p class="boxs" id="5workdays">
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
                                            </p>
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
                                                        <input checked="checked"  type="radio" value="1"> Yes
                                                    </label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="radio-inline" >
                                                        <input  type="radio" value="0"> No
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
                                                    <label class="radio-inline" id="yes">
                                                        <input  type="radio" value="1"> Yes
                                                    </label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <label class="radio-inline" id="no">
                                                        <input checked="checked"  type="radio" value="0"> No
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
                                            <select class="form-control" >
                                                <option value="">Please select...</option>
                                                <option value="limited" selected="selected">Limited carryover</option>
                                                <option value="unlimited">Unlimited carryover</option>
                                                <option value="none">No carryover</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="boxs" id="limited">
                                    <div class="form-group d-flex accruals-dependant carryover-dependant">
                                        <label class="col-md-3 control-label">
                                            Carryover limit
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control input-datepicker-close required" placeholder="DD.MM" autocomplete="off" data-date-format="dd.mm" date-value="1900-01-01" type="text" value="01.01">
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
                    <div id="time_off_accrual_policies161782" class="panel-group personio-panel-group margin-top-20">
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
                    </div>
                </div> 

            <div class="tab-pane  p-3" id="tab2" role="tabpanel">
                <h4 class="sub-header">General Settings <small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible2();">(Edit)</a> </small> <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a>
                </h4>
                    <div class="form-horizontal form-striped compact" id="office-div2">
                    
                </div>
                    <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office2" novalidate="novalidate">                     
                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible2();"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                        </div>
                    </div>
                </form>
                

            </div>
            
            <div class="tab-pane p-3" id="tab3" role="tabpanel">
                    <h4 class="sub-header">General Settings<small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible();">(Edit)</a> </small> <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a>
                </h4>
                <div class="form-horizontal form-striped compact" id="office-div">
                </div>
                
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office" novalidate="novalidate">                        
                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible();"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            



        </div>
        
        </div>

    </div>
</div>
@endsection
@section('admin-additional-js')
<script type="text/javascript">

     
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
       function switchVisible1() {
if (document.getElementById('office-div')) {

    if (document.getElementById('office-div1').style.display == 'none') {
        document.getElementById('office-div1').style.display = 'block';
        document.getElementById('office1').style.display = 'none';
    }
    else {
        document.getElementById('office-div1').style.display = 'none';
        document.getElementById('office1').style.display = 'block';
    }
}
}
       function switchVisible2() {
if (document.getElementById('office-div2')) {

    if (document.getElementById('office-div2').style.display == 'none') {
        document.getElementById('office-div2').style.display = 'block';
        document.getElementById('office2').style.display = 'none';
    }
    else {
        document.getElementById('office-div2').style.display = 'none';
        document.getElementById('office2').style.display = 'block';
    }
}
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
 $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
                $(".boxs").hide();
                $("#" + optionValue).show();
        });
    }).change();
});

 $("#no").click(function(){
    $(".carryover-type").hide();
  });
  $("#yes").click(function(){
    $(".carryover-type").show();
  });



  </script>
@endsection