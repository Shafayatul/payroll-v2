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
                <form method="POST" action="" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate"><input name="_token" type="hidden" value=""> <div class="input-group input-group-sm"> <input class="form-control" placeholder="New office..." required="" minlength="2" name="new_office_name" type="text"> <span class="input-group-btn"> <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button> </span> </div> </form><br>
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
                <h4 class="sub-header">{{ $calendar->name }} <small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible({{$calendar->id}});">(Edit)</a> </small> <a href="#modal-delete-calendar" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete calendar"></i> </a></h4>
                <div class="form-horizontal form-striped compact" id="calendar-year{{$calendar->id}}">
                    <p>This calendar contains the following public holidays:</p>
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
                </div>
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="calendar{{$calendar->id}}" style="display:none;" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-md-3 control-label">Holiday calendar name</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Holiday calendar name" required="" minlength="2" name="name" type="text" value="{{ $calendar->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
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
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/footable/js/footable.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/jquery.bootstrap-duallistbox.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
function switchVisible(id) {
    if (document.getElementById('calendar-year'+id)) {
        if (document.getElementById('calendar-year'+id).style.display == 'none') {
            document.getElementById('calendar-year'+id).style.display = 'block';
            document.getElementById('calendar'+id).style.display = 'none';
        }
        else {
            document.getElementById('calendar-year'+id).style.display = 'none';
            document.getElementById('calendar'+id).style.display = 'block';
        }
    }
}
$(document).ready(function() {
    $('.select-chosen').select2();
});


</script>
@endsection