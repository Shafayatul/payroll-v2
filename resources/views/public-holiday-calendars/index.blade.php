<!-- All Jquery -->
<!-- ============================================================== -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<script src="../assets/plugins/moment/moment.js" type="text/javascript"></script>
<script src="../assets/plugins/footable/js/footable.min.js"></script>     
<script src="js/main.js"></script>
<script src="js/jquery.bootstrap-duallistbox.js"></script>
<script src="../assets/plugins/select2/dist/js/select2.min.js"></script> 



<!--FooTable init-->


<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> --}}

@extends('layouts.admin.master')
@section('title', 'Settings')
@section('admin-additional-css')
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
<style type="text/css">
    .table thead th{
        border: 1px solid #dee2e6;
    }
</style>
@endsection
@section('content')
    @include('layouts.admin.include.alert')
    <div class="d-flex gutter30">
        <div class="col-md-4">
            <div class="block-section customvtab vtabs row">
                <h4 class="sub-header">Public holiday calendars</h4>
                <form method="POST" action="{{ route('public-holiday-calendars.store') }}" accept-charset="UTF-8" id="add-holiday-calendar" novalidate="novalidate">
                    @csrf 
                    <div class="input-group input-group-sm"> 
                        <input class="form-control" placeholder="New calendar..." required="" minlength="2" name="name" type="text"> 
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button> 
                        </span> 
                    </div> 
                </form><br>
                <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                    <li class="nav-item"><strong style="font-weight:550;"> Custom holiday calendars</strong></li>
                    @foreach($custom_holiday_calendars as $calendar)
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab{{$calendar->id}}" role="tab"> {{ $calendar->name }}</a></li>
                    @endforeach
                    <li class="nav-item"><strong style="font-weight:550;"> System holiday calendars</strong></li>
                    @foreach($system_holiday_calendars as $calendar)
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab{{$calendar->id}}" role="tab"> {{ $calendar->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-8 tab-content">
            @foreach($holiday_calendars as $calendar)
            <div class="block-section tab-pane {{ $loop->iteration == 1? 'active':'' }}" id="tab{{$calendar->id}}" role="tabpanel">
                <h4 class="sub-header">{{ $calendar->name }} <small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible({{$calendar->id}});">(Edit)</a> </small> <span class="pull-right"><a href="#modal-delete-calendar" data-toggle="modal"> <i class="fas fa-trash mr-1" data-toggle="tooltip" title="" data-original-title="Delete calendar"></i></a><a href=""><i class="fas fa-copy" data-toggle="tooltip" title="" data-original-title="Duplicate calendar"></i> </a></span></h4>
                <div class="form-horizontal form-striped compact" id="calendar-year{{$calendar->id}}">
                    @if($calendar->calendarYears->isEmpty())
                      <a href="#modal-add-holiday" data-toggle="modal">
                         <i class="fas fa-plus-circle"></i> Add holiday
                       </a>
                    @else
                    <p>This calendar contains the following public holidays.</p>
                    <ul class="nav nav-pills mb-3 ul-tab" id="pills-tab" role="tablist">
                        @foreach($calendar->calendarYears as $year)
                        <li class="nav-item"><a class="nav-link {{ $year->year == date('Y')? 'active':'' }}"" href="#calendar{{$year->id}}" role="tab" data-toggle="tab">{{$year->year}}</a> </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tab Content">
                        @foreach($calendar->calendarYears as $year)
                        <div class="block-section tab-pane {{ $year->year == date('Y')? 'active':'' }}" id="calendar{{$year->id}}" role="tabpanel">
                            <p>This calendar contains the following public holidays:</p>
                            <ul class="list-style-underline">
                                @foreach($year->holidays as $holiday)
                                <li>{{ $holiday->name }}: {{ $holiday->details }} - {{ $holiday->is_halfday }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('public-holiday-calendars.update', $calendar->id ) }}" accept-charset="UTF-8" class="form-horizontal" id="calendar{{$calendar->id}}" style="display:none;" novalidate="novalidate">
                    <div class="form-group row row">
                        <label class="col-md-3 control-label">Holiday calendar name</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Holiday calendar name" required="" minlength="2" name="name" type="text" value="{{ $calendar->name }}">
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
                    <div class="form-group row row">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible({{$calendar->id}});"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    <div id="modal-add-holiday" class="modal in" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                   
                    <h4 class="modal-title">Add a public holiday</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" action="" accept-charset="UTF-8" id="holiday_form" class="form-horizontal" novalidate="novalidate">
                    <div class="modal-body">
                        <p>Please select the type of holiday that you would like to add:</p>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <select class="form-control valid">
                                    <option value="" selected="selected">Please select …</option>
                                    <option value="existing">Existing holiday</option>
                                    <option value="fixed_date">Fixed date</option>
                                    <option value="fixed_date_once">Once on a fixed date</option>
                                    <option value="fixed_weekday">Weekday in month</option>
                                    <option value="easter_offset">Easter offset</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" placeholder="Name of holiday..." name="holiday_name" type="text">
                            </div>
                        </div>

                        <div class="holiday_form_type" id="existing">
                            <div class="form-group row">
                            </div>
                        </div>
                        <div class="holiday_form_type" id="fixed_date" style="">
                            <div class="form-group row">
                                <div class="col-md-5">
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
                        </div>
                        <div class="holiday_form_type" id="fixed_weekday">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <select class="form-control" name="weekday_number">
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="weekday">
                                        <option value="1">Mon</option>
                                        <option value="2">Tue</option>
                                        <option value="3">Wed</option>
                                        <option value="4">Thu</option>
                                        <option value="5">Fri</option>
                                        <option value="6">Sat</option>
                                        <option value="0">Sun</option>
                                    </select>
                                </div>
                                <div class="col-md-1 text-center">
                                    <p class="form-control-static">of</p>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="holiday_form_type" id="easter_offset">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <input class="form-control offset_hide_on" number="" min="1" name="easter_offset" type="text">
                                </div>
                                <div class="col-md-1 text-center">
                                    <p class="form-control-static offset_hide_on">days</p>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="offset_direction">
                                        <option value="before">before</option>
                                        <option value="after">after</option>
                                        <option value="on">on</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <p class="form-control-static">Easter (Sunday, 04/12/2020)</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row hide-for-existing">
                            <div class="col-md-12">
                                <input name="half_day" type="checkbox" value="1"> Half day?
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="holiday_confirm">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/footable/js/footable.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/jquery.bootstrap-duallistbox.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
//   function openTab(id){
//         $('.tab-pane').hide();
//         $('#tab'+id).show();
//         $(".department-update-form").hide();
//         // $('#department'+id).attr('style', 'display:none !important');
//         $('#department-div'+id).show();
//     }
//     function updateDepartment(id) {
//         $('.department-details').hide();
//         $('#department-'+id).show();
//     }
//     function cancelUpdate(id){
//         $('#department-'+id).hide();
//         $('#department-div'+id).show();
//     }
// $(document).ready(function() {
//     $('.select-chosen').select2();
// });

$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
                $(".holiday_form_type").hide();
                $("#" + optionValue).show();
        });
    }).change();
});

</script>
@endsection