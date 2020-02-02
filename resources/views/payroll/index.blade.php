@extends('layouts.admin.master')
@section('title', 'General Setting')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="background-white shadowed-box">  
    <div class="block block-tabs full">       
        <div class="block-title">
            <ul id="office_list" class="nav nav-tabs tabs-vertical ul-tab" data-toggle="tabs" ole="tablist">
                <li class="nav-item active"> 
                    <a class="nav-link" href="{{ route('payroll.general') }}">General</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="#">Payroll groups</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="#">Recurring compensation types</a> 
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="row gutter30">
                    <div class="col-md-11 tab-content">
                        <div class="block-section">
                            <h4 class="sub-header">
                                Payroll
                                <i class="fas fa-info-circle" style="font-size: medium" data-toggle="tooltip" data-delay="{&quot;hide&quot;:3000}" data-html="true" data-original-title="All attributes marked as <i>unique ID</i> will be added as columns in the Salary Data and Absence Periods sheets. <u><a href='' target=&quot;_blank&quot;>Learn more.</a></u>"></i>
                                <small>
                                    <a href="javascript:void(0)" class="edit-toggle" data-toggle="tooltip" onclick="switchVisible1();">
                                        (Edit)
                                    </a>
                                </small>
                            </h4>
                            <div class="form-horizontal form-striped compact" id="payroll-data">
                                <div class="form-group d-flex">
                                    <label class="col-md-4 control-label">
                                        Send review reminder on
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-original-title=" We'll send you a reminder to review all the changes on the current month's payroll on this day. You can manage your notification channels from your Personal Settings."></i>
                                    </label>
                                    <div class="col-md-7 form-control-static">
                                        {{ $payrollSetting->review_reminder_on }} of each month
                                    </div>
                                </div>                   
                                <div class="form-group d-flex">
                                    <label class="col-md-4 control-label">
                                        Separate salary data
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-original-title=" Salary data will be listed in a separate table sheet"></i>
                                    </label>
                                    <div class="col-md-7 form-control-static">
                                        @if($payrollSetting->is_separate == 1)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group d-flex">
                                    <label class="col-md-4 control-label">
                                        Attributes in personal data sheet
                                    </label>
                                    <div class="col-md-7 form-control-static">
                                        @foreach($payrollSetting->absences as $absence)
                                            <span class="label label-primary">{{ $absence->name }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-md-4 control-label">
                                        Absence types in absence periods sheet
                                    </label>
                                    <div class="col-md-7 form-control-static">
                                        @foreach($payrollSetting->attributes as $item)
                                            <span class="label label-primary">{{ $item->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-horizontal compact">
                                    <div class="form-group d-flex">
                                        <label class="col-md-4 control-label">
                                            Prorate salary calculation
                                            <i class="fas fa-info-circle" data-toggle="tooltip" data-original-title=" Calculation of prorate salaries for hire dates or terminations in the middle of a month">
                                            </i>
                                        </label>
                                        <div class="col-md-7 form-control-static">
                                            Based on 30 days
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- <form method="POST" accept-charset="UTF-8" class="form-horizontal" novalidate="novalidate" id="payroll-update-form">  --}}
                            {!! Form::model($payrollSetting, [
                                'method' => 'POST',
                                'route' => ['payroll.update', $payrollSetting->id],
                                'class' => 'form-horizontal',
                                'id' => 'payroll-update-form',
                                'files' => true,
                                'novalidate' => 'novalidate'
                            ]) !!}
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Send review reminder on
                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-original-title=" We'll send you a reminder to review all the changes on the current month's payroll on this day. You can manage your notification channels from your Personal Settings."></i>
                                </label>
                                <div class="col-md-1">
                                    <input class="form-control" number="" min="1" max="31" name="review_reminder_on" type="text" value="{{ $payrollSetting->review_reminder_on }}">
                                </div>
                                <div class="col-md-7 form-control-static">
                                    of each month
                                </div>
                            </div>                
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Separate salary data
                                </label>
                                <div class="col-md-8 form-control-static">                      
                                    <input confirm-message="With this setting, salary data will be displayed in a separate sheet. Therefore, all salary-related attributes will be removed from the current payroll export configuration." name="is_separate" type="checkbox" value="1" {{ ($payrollSetting->is_separate == 1) ? 'checked' : ''}}>
                                </div>
                            </div>
                            
                            {{-- @dd($payrollSetting->attributes->contains(0)) --}}
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Attributes in personal data sheet
                                 </label>
                                <div class="col-md-8">
                                    <select class="form-control select2 placeholder" name="select_attribute_id[]" id="absence_ids" multiple>
                                        @foreach($employeeInfoSections as $employeeInfoSection)
                                            @foreach($employeeInfoSection->employeeDetailAttributes as $attribute)
                                                <option value="{{ $attribute->id }}" {{ ($payrollSetting->attributes->contains($attribute->id )) ? 'selected' : '' }}>{{ $attribute->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Add an absence type
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control select2 placeholder" name="select_absence_id[]" id="e2_2" multiple>
                                        @foreach($absences as $absence)
                                            <option value="{{ $absence->id }}" {{ ($payrollSetting->absences->contains($absence->id )) ? 'selected' : '' }}>{{ $absence->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-4 control-label">
                                    Prorate salary calculation
                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-original-title=" Calculation of prorate salaries for hire dates or terminations in the middle of a month"></i>
                                </label>
                                <div class="col-md-3">
                                    <select class="form-control" name="prorate_salary_calculation">
                                        @foreach($payrollSetting->prorateSalaryType() as $key => $value)
                                            <option value="{{ $key }}" {{ ($payrollSetting->prorate_salary_calculation == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-md-9 offset-3">
                                    <button type="reset" class="btn btn-default edit-cancel">
                                        <i class="fas fa-times"></i> 
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-arrow-right"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>           
    </div>
</div>
@endsection
@section('admin-additional-js')
<script type="text/javascript">
document.getElementById('payroll-update-form').style.display = 'none';
function switchVisible1() {
    if (document.getElementById('payroll-update-form')) {

        if (document.getElementById('payroll-update-form').style.display == 'none') {
            document.getElementById('payroll-update-form').style.display = 'block';
            document.getElementById('payroll-data').style.display = 'none';
        }else {
            document.getElementById('payroll-update-form').style.display = 'none';
            document.getElementById('payroll-data').style.display = 'block';
        }
    }
}
</script>
@endsection