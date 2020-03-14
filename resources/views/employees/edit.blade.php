@extends('layouts.admin.master')
@section('title', "Employee $user->name")
@section('admin-additional-css')
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
 <link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
 <link href="{{ asset('admin/assets/plugins/wizard/steps.css') }}" rel="stylesheet">
 <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Employee</a></li>
            <li class="breadcrumb-item active">Employee: {{ $user->name }}</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Employee: {{ $user->name }}</div>
            <div class="card-body wizard-content">
                <form role="form" action="{{ route('employees.update') }}" id="employee-submit" class="tab-wizard wizard-circle" method="POST">
                @csrf
                @method('POST')
                <h6>User Info</h6>
                <section>
                    <div class="form-group row">
                        <label for="input-name" class="control-label col-md-4">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="input-name" name="name" placeholder="Enter Name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group row">
                        <label for="input-email" class="control-label col-md-4">Email</label>
                        <div class="col-md-6">
                            <input type="text" id="input-email" name="email" placeholder="Enter email" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="employee_type" class="control-label col-md-4">Employee type</label>
                        <div class="col-md-6">
                            <select class="select2 form-control" id="employee_type" name="employee_type">
                                @foreach (Auth::user()->employeeType() as $key => $type)
                                <option value="{{ $key }}" {{ ($key == $user->employee_type) ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-salary" class="control-label col-md-4">Salary</label>
                        <div class="col-md-6">
                            <input type="text" id="input-salary" name="salary" placeholder="Enter salary" class="form-control" value="{{ $user->salary }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-office" class="control-label col-md-4">Office</label>
                        <div class="col-md-6">
                            <select class="select2 form-control" id="input-office" name="office">
                                @foreach (Auth::user()->office->company->offices as $office)
                                <option value="{{ $office->id }}" id="office-{{ $office->id }}" {{ ($office->id == $user->office_id) ? 'selected' : '' }}>{{ $office->name }} {{ $office->city ? ', '.$office->city : $office->company->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-department" class="control-label col-md-4">Department</label>
                        <div class="col-md-6">
                            <select class="select2 form-control" id="input-department" name="department">
                                @foreach (Auth::user()->office->company->departments as $department)
                                <option value="{{ $department->id }}" id="department-{{ $department->id }}" {{ ($department->id == $user->department_id) ? 'selected' : '' }}>{{ $department->name }}{{ $department->city ? ', '.$department->city : '' }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </section>
                @foreach ($sections as $section)
                <!-- Step {{$loop->iteration}} -->
                <h6>{{ $section->name }}</h6>
                <section>
                    @foreach ($section->employeeDetailAttributes as $attribute)
                    <div class="form-group row">
                        <label for="input-{{$attribute->id}}" class="control-label col-md-4">{{$attribute->name}}</label>
                        <div class="col-md-6">
                            @php
                                if($user->employeeDetails->contains($attribute->id) == true){
                                    $attribute_value = $user->employeeDetails()->where('employee_details.attribute_id', $attribute->id)->first();
                                }
                            @endphp
                            @if($attribute->dataTypes->key == 0)
                            <input type="text" id="input-{{$attribute->id}}" name="value[{{$attribute->id}}]" placeholder="{{$attribute->name}}" class="form-control" value="{{ $attribute_value->value }}">
                            @elseif($attribute->dataTypes->key == 1)
                            
                            <select class="form-control custom-select" id="input-{{$attribute->id}}" name="value[{{$attribute->id}}]">
                                @foreach ($attribute->dataTypes->attributeOptions as $option)
                                <option value="{{ $option->id }}" {{ ($option->id == $attribute_value->value) ? 'selected' : '' }}>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            
                            @elseif($attribute->dataTypes->key == 4)
                            <div class="input-group">
                                <input type="text" id="input-{{$attribute->id}}" name="value[{{$attribute->id}}]" class="form-control date" id="date-{{$attribute->id}}" data-date="{{$attribute->id}}" placeholder="dd/mm/yyyy" value="{{ $attribute_value->value }}">
                                <div class="input-group-append">
                                    <span class="input-group-text date-calendar" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                            @elseif($attribute->dataTypes->key == 7)
                            <select class="tag form-control" id="input-{{$attribute->id}}" multiple="multiple" name="value[{{$attribute->id}}][]">
                                @foreach ($attribute->dataTypes->attributeOptions as $option)
                                <option value="{{ $option->id }}" id="taged-{{ $option->id }}" {{ ($option->id == $attribute_value->value) ? 'selected' : '' }}>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </section>
                @endforeach
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
{{-- /home/salman/Projects/payroll-v2/public/admin/assets/plugins/daterangepicker/moment.min.js --}}
{{-- <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('admin/assets/plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script> --}}
<script src="{{ asset('admin/js/jquery.bootstrap-duallistbox.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>

<script src="{{ asset('admin/assets/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/wizard/jquery.validate.min.js') }}"></script>
<!-- Sweet-Alert  -->
<script src="{{ asset('admin/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/plugins/wizard/steps.js') }}"></script> --}}

<script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

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

    (function($){  
        var dataTable;
        var select2Init = function(){
            $('.tag').select2({
                maximumSelectionLength: 3
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
                "showDropdowns": true,
                // "linkedCalendars": false,
                // "autoUpdateInput": false,
                // "alwaysShowCalendars": false,
                // "showCustomRangeLabel": false,
                // "minYear": 1901,
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
<script>
    // $(function(){"use strict";$(function(){$(".preloader").fadeOut()}),jQuery(document).on("click",".mega-dropdown",function(i){i.stopPropagation()});var i,e,o,s=function(){(window.innerWidth>0?window.innerWidth:this.screen.width)<1170?($("body").addClass("mini-sidebar"),$(".navbar-brand span").hide(),$(".sidebartoggler i").addClass("ti-menu")):($("body").removeClass("mini-sidebar"),$(".navbar-brand span").show(),$(".sidebartoggler i").removeClass("ti-menu"));var i=(window.innerHeight>0?window.innerHeight:this.screen.height)-1;(i-=70)<1&&(i=1),i>70&&$(".page-wrapper").css("min-height",i+"px")};$(window).ready(s),$(window).on("resize",s),$(".sidebartoggler").on("click",function(){$("body").hasClass("mini-sidebar")?($("body").trigger("resize"),$("body").removeClass("mini-sidebar"),$(".navbar-brand span").show(),$(".sidebartoggler i").addClass("ti-menu")):($("body").trigger("resize"),$("body").addClass("mini-sidebar"),$(".navbar-brand span").hide(),$(".sidebartoggler i").removeClass("ti-menu"))}),$(".fix-header .topbar").stick_in_parent({}),$(".nav-toggler").click(function(){$("body").toggleClass("show-sidebar"),$(".nav-toggler i").toggleClass("ti-menu"),$(".nav-toggler i").addClass("ti-close")}),$(".right-side-toggle").click(function(){$(".right-sidebar").slideDown(50),$(".right-sidebar").toggleClass("shw-rside")}),$(function(){for(var i=window.location,e=$("ul#sidebarnav a").filter(function(){return this.href==i}).addClass("active").parent().addClass("active");e.is("li");)e=e.parent().addClass("in").parent().addClass("active")}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(function(){$('[data-toggle="popover"]').popover()}),$(function(){$("#sidebarnav").metisMenu()}),$(".message-center").slimScroll({position:"right",size:"5px",color:"#dcdcdc"}),$(".aboutscroll").slimScroll({position:"right",size:"5px",height:"80",color:"#dcdcdc"}),$(".message-scroll").slimScroll({position:"right",size:"5px",height:"570",color:"#dcdcdc"}),$(".chat-box").slimScroll({position:"right",size:"5px",height:"470",color:"#dcdcdc"}),$(".slimscrollright").slimScroll({height:"100%",position:"right",size:"5px",color:"#dcdcdc"}),$("body").trigger("resize"),$(".list-task li label").click(function(){$(this).toggleClass("task-done")}),$("#to-recover").on("click",function(){$("#loginform").slideUp(),$("#recoverform").fadeIn()}),$(".custom-file-input").on("change",function(){var i=$(this).val();$(this).next(".custom-file-label").html(i)}),$(document).on("click",".card-actions a",function(i){i.preventDefault(),$(this).hasClass("btn-close")&&$(this).parent().parent().parent().fadeOut()}),i=jQuery,window,e=document,i(o='[data-perform="card-collapse"]').each(function(){var e=i(this),o=e.closest(".card"),s=o.find(".card-block"),a={toggle:!1};s.length||(s=o.children(".card-heading").nextAll().wrapAll("<div/>").parent().addClass("card-block"),a={}),s.collapse(a).on("hide.bs.collapse",function(){e.children("i").removeClass("ti-minus").addClass("ti-plus")}).on("show.bs.collapse",function(){e.children("i").removeClass("ti-plus").addClass("ti-minus")})}),i(e).on("click",o,function(e){e.preventDefault(),i(this).closest(".card").find(".card-block").collapse("toggle")})});

    $("#employee-submit").steps({
        headerTag: "h6"
        , bodyTag: "section"
        , transitionEffect: "fade"
        , titleTemplate: '<span class="step">#index#</span> #title#'
        , labels: {
            finish: "Submit"
        }
        , onFinished: function (event, currentIndex) {
            $('form#employee-submit').submit();  
        }
    });
</script>

@endsection