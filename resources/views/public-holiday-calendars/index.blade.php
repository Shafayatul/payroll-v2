@extends('layouts.admin.master')
@section('title', 'Settings')
@section('admin-additional-css')
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
<link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

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
                        <input class="form-control" placeholder="Name of holiday..." required="" minlength="2" name="name" type="text"> 
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
                                <li>{{ $holiday->name }}: {{ \Carbon\Carbon::parse($holiday->date)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($holiday->date)->format('l') }} {{ $holiday->details ? ','.$holiday->details:''}} </li>
                                @endforeach
                            </ul>
                            <div id="modal-add-holiday{{ $year->year }}" class="modal in" tabindex="-1" role="dialog" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">                   
                                            <h4 class="modal-title">Add a public holiday</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form method="POST" action="{{ route('holidays.store') }}" accept-charset="UTF-8" id="holiday_form" class="form-horizontal" novalidate="novalidate">
                                            @csrf
                                            <div class="modal-body">
                                                <p>Please select the type of holiday that you would like to add:</p>
                                                <input type="hidden" name="public_holiday_calendar_id" value="{{ $calendar->id }}">
                                                <input type="hidden" name="year" value="{{ $year->year }}">
                                                <div class="form-group row">
                                                    <div class="col-md-5">
                                                        <select class="form-control valid select-type" data-year="{{ $year->year }}" data-calendar="{{ $calendar->id }}" name="type">
                                                            <option value="" >Please select …</option>
                                                            @foreach (Auth::user()->holidayType() as $key => $type)
                                                            <option value="{{ $key }}">{{ $type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-7" id="holiday-name-{{ $year->year }}">
                                                        <input class="form-control" placeholder="Name of holiday..." name="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row"" id="holiday-appending-{{ $year->year }}">
                        
                                                </div>
                                                <div class="form-group row hide-for-existing">
                                                    <div class="col-md-12">
                                                        <input name="half_day" id="half-day" type="checkbox" value="1"> <label for="half-day">  Half day?</label>
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
                            @if($calendar->type == 1)
                            <a href="#modal-add-holiday{{ $year->year }}" data-toggle="modal">
                                <i class="fas fa-plus-circle"></i> Add holiday
                            </a><br>
                            @endif
                        </div>
                        @endforeach
                    </div>
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
    @php
        $options = [];        
        foreach($holiday_calendars as $calendar){
            foreach($calendar->calendarYears as $year){
                $holiday = $year->holidays()->pluck('name', 'id')->toArray();
                foreach($holiday as $key => $holi){
                    $options[$key] = $holi;
                }
            }
        }
    @endphp
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/footable/js/footable.min.js') }}"></script>
{{-- <script src="{{ asset('js/main.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.bootstrap-duallistbox.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){
        $("select.select-type").change(function(){
            let value = $(this).val();
            let year = $(this).data('year');
            let html = '';
            let name = '';
            if(value == 0){
                let id = $(this).data('calendar');
                html = `<div class="col-md-5">
                            <select class="form-control" name="exist_holiday">
                                @foreach ($options as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>`;
                $('#holiday-appending-'+year).html(html);
            } else if(value == 1 || value == 2){
                html = `<div class="col-md-5" id="fixed_date" style="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="date" id="date" placeholder="mm/dd/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>`;
                $('#holiday-appending-'+year).html(html).daterangepicker({
                    "singleDatePicker": true,
                    "showDropdowns": true,
                    // "linkedCalendars": false,
                    // "autoUpdateInput": false,
                    // "alwaysShowCalendars": false,
                    // "showCustomRangeLabel": false,
                    // "minYear": 1901,
                    "format": "MM/DD/YYYY"
                }, function(start, end, label) {
                    $('#date').val(start.format('MM/DD/YYYY'));
                });
                name = `<input class="form-control" placeholder="Name of holiday..." name="name" type="text">`;
            } else if(value == 3){
                html = `<div class="col-md-2 m-2">
                            <select class="form-control" name="weekday_number">
                                @foreach (Auth::user()->weekNumber() as $key => $number)
                                <option value="{{ $key }}">{{ $number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 m-2">
                            <select class="form-control" name="weekday">
                                @foreach (Auth::user()->weekDay() as $key => $day)
                                <option value="{{ $key }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 text-center m-2">
                            <p class="form-control-static">of</p>
                        </div>

                        <div class="col-md-3 m-2">
                            <select class="form-control" name="month">
                                @foreach (Auth::user()->monthNumber() as $key => $month)
                                <option value="{{ $key }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>`;
                $('#holiday-appending-'+year).html(html);
                name = `<input class="form-control" placeholder="Name of holiday..." name="name" type="text">`;
            } else if (value == 4){
                html = `<div class="col-md-2">
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
                        </div>`;
                $('#holiday-appending-'+year).html(html);
                name = `<input class="form-control" placeholder="Name of holiday..." name="name" type="text">`;
            }
            $('#holiday-name-'+year).html(name);
        });
    });

</script>
@endsection