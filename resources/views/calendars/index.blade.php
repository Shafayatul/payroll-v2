@extends('layouts.admin.master')
@section('title', 'Calendars')
@section('admin-additional-css')
    <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
    <link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
    <link href="{{ asset('admin/css/calendar.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
 <div class="container">                
                     
    <div class="block-title">
        <ul id="office_list " class="nav nav-tabs tabs-vertical ul-tab" data-toggle="tabs" ole="tablist">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab1" role="tab"> Absences </a> </li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2" role="tab"> Calendar Integration </a> </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
                <div class="row">
                <div class="block-section">
                    <h4 class="sub-header">
                        Absence Calendar
                        <small><a href="javascript:void(0)" id="mainChk">(Edit)</a></small>
                    </h4>
                </div>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    Select the absence types that should be included in the system calendar "Absences". Employees with access to this calendar will only see that colleagues are absent but not the type of each absence period.
                </div>
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal w-100">
                    <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Paid vacation</label>
                        <div class="col-md-5 form-control-static">									                   
                            <input class="categories"  type="checkbox" value="1" >
                        </div>
                    </div>
                        <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Sick days</label>
                        <div class="col-md-5 form-control-static">									                    
                            <input class="categories" type="checkbox" value="1" >
                        </div>
                    </div>
                            <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Parental leave</label>
                        <div class="col-md-5 form-control-static">									                    
                            <input class="categories" type="checkbox" value="1" >
                        </div>
                    </div>
                            <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Maternity protection</label>
                        <div class="col-md-5 form-control-static">									                  
                            <input class="categories"   type="checkbox" value="1" >
                        </div>
                    </div>
                            <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Unpaid vacation</label>
                        <div class="col-md-5 form-control-static">
                            
                            <input  class="categories" checked="checked"  type="checkbox" value="1" >
                        </div>
                    </div>
                            <div class="form-group d-flex">
                        <label class="col-md-4 control-label">Home office</label>
                        <div class="col-md-5 form-control-static">									                    
                            <input   class="categories"  type="checkbox" value="1" >
                        </div>
                    </div>
                    <div class="form-group " id="cencel-btn" style="display: none;">
                        <button type="reset" class="btn btn-default edit-reset"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="tab-pane " id="tab2">								     	
            <div id="calendar">
                <div style="padding: 20px 8px;">
                    <h2 class=" text-bold">Connect your calendar</h2>
                    <div class="d-flex">
                        <div class="col-md-6">
                            <p class="">
                                <strong class="">Begin managing interviews and schedules through Personio or synchronising absence periodswith externally used calendars like e.g. Google Calendar. By connecting your calendar to Personio your absence periods tracked in Personio will be automatically displayed in your personal calendar so you do not have to add it manually anymore. Using the recruiting part, you can additionally view room and employee availabilities, as well as book rooms for your interviews.</strong>
                            </p>
                            <label class="m-0">
                                <div class="input-group">
                                    <label class="minimal-checkbox-1" title="">
                                <input type="checkbox" class="check mr-1" id="minimal-checkbox-2" checked>
                                    I hereby activate the calendar integration, which is provided by a third party called Cronofy Ltd. I have read the privacy policy and agree to the terms of use
                                    <a href="javascript:void(0)"> (see here).</a>
                                    </label>
                                </div>
                            </label>
                            <label class="no-margin">
                                <div class="input-group">
                                    <label class="minimal-checkbox-1" title="">
                                        <input type="checkbox" class="check mr-1" id="minimal-checkbox-2" checked>
                                        I confirm that I am legally entitled to activate the calendar on behalf of the company.
                                    </label>
                                </div>
                            </label>
                            <label class="no-margin">
                                <div class="input-group">
                                    <label class="minimal-checkbox-1" title="">
                                        <input type="checkbox" class="check mr-1" id="minimal-checkbox-2" checked>Show private event details on the Personio calendar<a href="javascript:void(0)"> (more info). </a>(optional)</label>
                                </div>
                            </label>
                            <div class="">
                                    <button class="btn btn-info"  type="button">
                                    <div class="_2M5r2"><div>Connect Calendar</div></div>
                                    </button>
                                    <button class="btn btn-light" type="button">			                        				
                                        <div><i class="fas fa-info-circle" style="font-size: 14px;"></i></div>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="w-100" alt="" src="https://we-are-hiring.cdn.personio.de/build/client/img/abstract-calendar-en.png?3cd9b3364dd898c52e398a7adb49e016">
                        </div>
                    </div>
                </div>
            </div>
        </div> 	 --}}
    </div>
</div>
@endsection
@section('admin-additional-js')
<script>
$(document).ready(function(){
    var isCheckToggle = true;

    $('.categories').attr("disabled", true);  		
    $('#mainChk').on('click', function(){
        if(isCheckToggle){
            $('.categories').prop("disabled", false);			
            $('#cencel-btn').show();			
        }else{
            $('.categories').prop("disabled", true);
            $('#cencel-btn').hide();		
        }
        isCheckToggle = !isCheckToggle;
    });
});
</script>
@endsection