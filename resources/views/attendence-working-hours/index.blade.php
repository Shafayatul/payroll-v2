@extends('layouts.admin.master')
@section('title', 'Attendenceworkinghours')
@section('admin-additional-css')
<link href="{{ asset('admin/css/jquery.timepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="shadowed-box">
    <div class="full">
        <h2 class="text-bold">Public Holidays</h2>  
        <div class="d-flex gutter30">
            <div class="col-md-4">
                <div class="block-section customvtab vtabs row">
                    <h4 class="sub-header">Public holiday calendars</h4>
                    <form method="POST" action="{{ route('attendence-working-hours.store') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                        @csrf
                        <div class="input-group input-group-sm"> 
                            <input class="form-control" placeholder="New Attendence Working Hours..." required="" minlength="2" name="name" type="text"> 
                            <span class="input-group-btn"> 
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </button> 
                            </span> 
                        </div> 
                    </form>
                    <br>

                    <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist"> 
                        @foreach($attendenceworkinghours as $attendenceworkinghour)
                            <li class="nav-item">
                                <a class="nav-link {{$loop->iteration == 1? 'active':''}}" data-toggle="tab" onclick="openTab({{ $attendenceworkinghour->id }})" role="tab"> 
                                    {{ $attendenceworkinghour->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8 tab-content">
                @foreach($attendenceworkinghours as $attendenceworkinghour)
                <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}}" id="tab{{ $attendenceworkinghour->id }}" role="tabpanel">
                    <h4 class="sub-header">
                        {{ $attendenceworkinghour->name }}
                        <small> 
                            <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="updateDepartment({{ $attendenceworkinghour->id }});">
                                (Edit)
                            </a> 
                        </small> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['attendence-working-hours.destroy', $attendenceworkinghour->id],
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
                    <div class="form-horizontal form-striped compact department-details" id="department-div{{ $attendenceworkinghour->id }}">
                        <div class="form-horizontal form-striped compact" style="">
                            <div class="form-group d-flex">
                                <div class="col-md-11 form-control-static">
                                    <a href="#modal-confirm-make-default-schedule" data-schedule-id="166716">
                                        Make default schedule
                                    </a>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-md-12 form-control-static" style="text-align: justify">
                                    <i class="fas fa-info-circle"></i>
                                    The following schedule informs the assigned employee about his/her working schedule and defines the working hours for each work day (used in overtime calculation) as well as the free days that then do not count into absence calculations
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-md-10 offset-1 form-control-static">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Week day</th>
                                                <th>Working hours</th>
                                                <th>Break</th>
                                                <th>Schedule</th>
                                            </tr>
                                            @foreach($attendenceworkinghour->weekdays as $weekday)
                                            <tr>
                                                <td>{{ $weekday->weekday }}</td>
                                                <td>{{ $weekday->working_hours }}</td>
                                                <td>-</td>
                                                <td>{{ $weekday->start_time.'-'.$weekday->end_time }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                                </div>
                            </div>
                            <div class="form-group  d-flex">
                                <label class="col-md-3 control-label"> Track overtime </label>
                                <div class="col-md-8 form-control-static">
                                    @if($attendenceworkinghour->is_track_overtime == 1) 
                                        Yes
                                    @else
                                        No
                                    @endif 
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Overtime calculation
                                </label>
                                <div class="col-md-8 form-inline">
                                    <span class="mr-1">on</span> 
                                    <select class="form-control" disabled>
                                        <option value="daily" {{ ($attendenceworkinghour->overtime_calculation == 'daily') ? 'selected' : '' }}>
                                            daily
                                        </option>
                                        <option value="weekly" {{ ($attendenceworkinghour->overtime_calculation == 'weekly') ? 'selected' : '' }}>
                                            weekly
                                        </option>
                                    </select>
                                    <span class="ml-1">basis</span> 
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Overtime cliff
                                </label>
                                <div class="col-md-8 form-inline">
                                    Overtime does not apply for the first
                                    <input class="form-control number" disabled="disabled" style="width:80px" type="text" value="{{ $attendenceworkinghour->overtime_cliff }}">
                                    overtime hours an employee worked in a month
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Deficit hours
                                    <span data-toggle="tooltip" data-title="Prorate calculation of accrued days based on number of workdays" data-original-title="" title="">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                 </label>
                                <div class="col-md-8 form-control-static">
                                    @if($attendenceworkinghour->is_deficit == 1) 
                                        Yes
                                    @else
                                        No
                                    @endif 
                                </div>
                            </div>

                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Prorate vacation
                                    <span data-toggle="tooltip" data-title="Prorate calculation of accrued days based on number of workdays" data-original-title="" title="">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                 </label>
                                <div class="col-md-8 form-control-static">
                                    @if($attendenceworkinghour->is_prorate_vacation == 1) 
                                        Yes
                                    @else
                                        No
                                    @endif 
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label">
                                    Reference value for the prorated vacation calculation
                                    <span data-toggle="tooltip" data-title="As a reference value for prorated vacation calculation please enter the number of working days that form a full working week in your company." data-original-title="" title="">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                </label>
                                <div class="col-md-8 form-control-static">
                                    5
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal department-update-form" id="department-{{ $attendenceworkinghour->id }}" novalidate="novalidate" style="display:none">
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Name
                            </label>
                            <div class="col-md-9">
                                <input class="form-control" required="" minlength="2"  type="text" value="{{ $attendenceworkinghour->name }}">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Week day
                            </label>
                            <div class="d-flex col-md-9">
                                <div class="col-md-3 text-center form-control-static">
                                    <b>Working hours</b>
                                </div>
                                <div class="col-md-3 text-center form-control-static">
                                    <b>Start</b>
                                </div>
                                <div class="col-md-3 text-center form-control-static">
                                    <b>End</b>
                                </div>
                                <div class="col-md-3 text-center form-control-static">
                                    <b>Break</b>
                                </div>
                            </div>
                        </div>
                        @foreach($attendenceworkinghour->weekdays as $weekday)
                            <div class="form-group d-flex">
                                <label class="col-md-3 control-label week-day">
                                    {{ $weekday->weekday }}
                                </label>
                                <div class="col-md-9 d-flex">                    
                                    <div class="col-md-3 total">
                                        <div class="input-group ">
                                           <input class="form-control selectExample" placeholder="hh:mm"  type="text" value="{{ $weekday->working_hours }}" autocomplete="off" default-val="08:00" disabled="disabled" name="working_hours">
                                        </div>
                                    </div>
                                    <div class="col-md-3 start">
                                        <div class="input-group ">
                                           <input class="form-control selectExample" placeholder="hh:mm" type="text" name="start_time" value="{{ $weekday->start_time }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3 end">
                                        <div class="input-group ">
                                            <input class="form-control selectExample" placeholder="hh:mm"  type="text" name="end_time" value="{{ $weekday->end_time }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3 break">
                                        <div class="input-group ">
                                            <input class="form-control selectExample" placeholder="hh:mm"  type="text" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach                        
                             
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Track overtime
                            </label>
                            <div class="col-md-9 form-control-static">           
                                <input id="is-track" type="checkbox" name="is_track_overtime" value="1" {{ ($attendenceworkinghour->is_track_overtime == 1) ? 'checked' : '' }}>
                            </div>
                        </div>
                    <div id="track-overtime-data" style="display: none;">
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Overtime calculation
                            </label>
                            <div class="col-md-9 form-inline">
                                on
                                <select id="overtime-calculation-type" name="overtime_calculation" class="form-control" style="width:auto" >
                                    <option value="daily" {{ ($attendenceworkinghour->overtime_calculation == 'daily') ? 'selected' : '' }}>daily</option>
                                    <option value="weekly" {{ ($attendenceworkinghour->overtime_calculation == 'weekly') ? 'selected' : '' }}>weekly</option>
                                </select>
                                basis
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Overtime cliff
                            </label>
                            <div class="col-md-9 form-inline">
                                Overtime does not apply for the first
                                <input class="form-control number" name="overtime_cliff" style="width:80px"  type="text" value="{{ $attendenceworkinghour->overtime_cliff }}">
                                overtime hours an employee worked in a month
                            </div>
                        </div>
                        <div class="form-group d-flex" id="deficit-data" style="display: none !important;">
                            <label class="col-md-3 control-label">
                                Deficit hours
                                <span data-toggle="tooltip" data-title="When activated, deficit hours are set off against overtime" data-original-title="" title="">
                                    <i class="far fa-info-circle"></i>
                                </span>
                            </label>
                            <div class="col-md-9 form-control-static">                 
                                <input name="is_deficit" id="is-deficit" type="checkbox" value="1" {{ ($attendenceworkinghour->is_deficit == 1) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                        <div class="form-group d-flex">
                            <label class="col-md-3 control-label">
                                Prorate vacation
                                <span data-toggle="tooltip" data-title="Prorate calculation of accrued days based on number of workdays" data-original-title="" title="">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </label>
                            <div class="col-md-9 form-control-static">                    
                                <input name="is_prorate_vacation" id="is-prorate-vacation" type="checkbox" value="1" {{ ($attendenceworkinghour->is_prorate_vacation == 1) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="form-group d-flex" id="reference-value-div" style="display: none;">
                            <label class="col-md-3 control-label">
                                Reference value for the prorated vacation calculation
                                <span data-toggle="tooltip" data-title="As a reference value for prorated vacation calculation please enter the number of working days that form a full working week in your company." data-original-title="" title="">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </label>
                            <div class="col-md-9 form-inline">
                                <select class="form-control" name="reference_value" style="width:auto">
                                    <option value="4" {{ ($attendenceworkinghour->reference_value == 4) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ($attendenceworkinghour->reference_value == 5) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ($attendenceworkinghour->reference_value == 6) ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ ($attendenceworkinghour->reference_value == 7) ? 'selected' : '' }}>7</option>
                                </select>
                            </div>
                        </div>                     
                        <div class="form-group row">
                            <div class="col-md-9 offset-3">
                                <button type="reset" class="btn btn-default edit-cancel" onclick="cancelUpdate({{ $attendenceworkinghour->id  }});">
                                    <i class="fas fa-times"></i> 
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-arrow-right"></i> 
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/js/jquery.timepicker.min.js') }}"></script>
<script type="text/javascript">
    function openTab(id){
        $('.tab-pane').hide();
        $('#tab'+id).show();
        $(".department-update-form").hide();
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

    $("#is-track").click(function(){
        if($('#is-track').is(":checked")){
            $("#track-overtime-data").show(500);
        }else{
            $("#track-overtime-data").hide(500);
        }
    });
    
    $('#overtime-calculation-type').change(function(){
        var overtime_calculation_type = $(this).val();
        alert(overtime_calculation_type);
        if(overtime_calculation_type == 'daily'){
            $("#deficit-data").show(500);
        }
        if(overtime_calculation_type == 'weekly'){
            $("#deficit-data").hide(500);
        }
    });

    
    $("#is-prorate-vacation").click(function(){
        if($('#is-prorate-vacation').is(":checked")){
            $("#reference-value-div").show(500);
        }
    });
</script>
<script type="text/javascript">
    $('.selectExample').timepicker({ 'timeFormat': 'H:s' });
</script>
@endsection