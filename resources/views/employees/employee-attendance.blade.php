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
 <link href="{{ asset('admin/assets/plugins/wizard/steps.css') }}" rel="stylesheet">
 <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
             <div class=" table-responsive m-t-40">
                <section class="filters well">
                    <fieldset class="row">
                        <div class="filters-list">Filters list</div>
                        <div class="Filter-button">                                   
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
                        <div class="Filter-button">
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
                        <div class="Filter-button"> 
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
                        <div class="Filter-button">
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
                        <div class="Filter-button">
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
                        <div class="Filter-button"> 
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
                    </fieldset> 
                </section>
                <section class="data">   
                    <table id="example" class="display datatable table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                        <thead>
                            <tr>
                                <th class="table-topper"><input type="checkbox"></th>
                                {{-- <th style="left: 37px;" class="table-topper"></th> --}}
                                <th> Name</th>
                                <th> Email</th>
                                @foreach ($attributes as $attribute)
                                <th class="table-topper">{{ $attribute->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td><input type="checkbox"></td>
                                {{-- <td style="left: 37px;"> <img src="../assets/images/users/4.jpg" alt="user" width="40" --}}
                                    class="img-circle" />
                                </td>
                                <td style="left: 37px;">
                                    {{ $employee->name }}
                                </td>
                                <td style="left: 37px;">
                                    {{ $employee->email }}
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
</body>

</html>