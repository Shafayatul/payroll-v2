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
            <section class="data">   
                <table id="example" class="display datatable table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                    <thead>
                        <tr>
                            <th> Year</th>
                            <th> Month</th>
                            <th> Basic</th>
                            <th> $ Per hr</th>
                            <th> Workday</th>
                            <th> Office Work Hour</th>
                            <th> Work Hour</th>
                            <th> Overtime</th>
                            <th> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($months as $key => $month)
                        
                        <tr>
                            <td style="left: 37px;">
                                {{ \Carbon\Carbon::parse($key)->format('Y') }}
                            </td>
                            <td style="left: 37px;">
                                {{ \Carbon\Carbon::parse($key)->format('F') }}
                            </td>
                            @php
                                $salary = number_format($employee->salary, 2, '.', ',');
                            @endphp
                            <td style="left: 37px;">
                                {{ ' $'. $salary }}
                            </td>
                            <td style="left: 37px;">
                                {{ ' $'. number_format(($employee->salary / 173), 2, '.', ',') }}
                            </td>
                            <td style="left: 37px;">
                                {{ $month->count > 1? $month->count.' days':'0'.$month->count.' day' }}
                            </td>
                            <td style="left: 37px;">
                                @php
                                    $office_work_time = (($month->work_time - $month->break_time) * 60);
                                @endphp
                                {{ intdiv($office_work_time, 60).' hours '.($office_work_time % 60).' minutes' }}
                            </td>
                            <td style="left: 37px;">
                                @php
                                    $work_time = (($month->total_time - $month->break_time) * 60);
                                @endphp
                                {{ intdiv($work_time, 60).' hours '. ($work_time % 60).' minutes' }}
                            </td>
                            <td style="left: 37px;">
                                @php
                                    $overtime = ($work_time - ( 173 * 60 ) > 0 ? $work_time - ( 173 * 60 ) : 00);
                                @endphp
                                {{ intdiv($overtime, 60).' hours '. ($overtime % 60).' minutes' }}
                            </td>
                            <td style="left: 37px;">
                                <button data-toggle="modal" data-target="#salary-info-details-{{ \Carbon\Carbon::parse($key)->format('F-Y') }}" class=" btn btn-secondary"><i class=" fas fa-eye"></i> View Details</button>
                            </td>
                        </tr>

                        <div class="modal in fade" id="salary-info-details-{{ \Carbon\Carbon::parse($key)->format('F-Y') }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        @php
                                            $month_year = \Carbon\Carbon::parse($key)->format('F-Y');
                                            $paid = $employee->salaries()->where('get_salary_month', $month_year)->first();
                                        @endphp
                                        <h4 class="modal-title text-left">Salary Details {{ \Carbon\Carbon::parse($key)->format('F-Y') }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="card-body pt-0">
                                            <div class="d-flex pb-2 ">
                                                <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="">
                                                            <span ><b class="font-weight-bold">Name :</b></span>
                                                        </div>
                                                        <div class="ml-2">
                                                            <span>{{ $employee->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <span><b class="font-weight-bold">Basic Salary :</b></span>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>${{ number_format($employee->salary, 2, '.','') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex pb-2 ">
                                                <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="">
                                                            <span ><b class="font-weight-bold">Employee type:</b></span>
                                                        </div>
                                                        <div class="ml-2">
                                                            <span>{{ $employee->employeeType()[$employee->employee_type] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <span><b class="font-weight-bold">$/hr for Month:</b></span>
                                                        </div>
                                                        <div class="col-md-7">
                                                            @php
                                                                $h = 0;
                                                                if($employee->employee_type == 1){
                                                                    $h = $employee->salary/86.5;
                                                                } else {
                                                                    $h = $employee->salary/173;
                                                                }
                                                            @endphp
                                                            <span>${{ number_format($h, 2, '.','') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex pb-2 ">
                                                <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="">
                                                            <span ><b class="font-weight-bold">Salary Status:</b></span>
                                                        </div>
                                                        <div class="ml-2">
                                                            <span>{{ $paid == null? 'Not paid':'Paid' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6 my-1">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <span><b class="font-weight-bold">$/hr for Month:</b></span>
                                                        </div>
                                                        <div class="col-md-7">
                                                            @php
                                                                $h = 0;
                                                                if($employee->employee_type == 1){
                                                                    $h = $employee->salary/86.5;
                                                                } else {
                                                                    $h = $employee->salary/173;
                                                                }
                                                            @endphp
                                                            <span>${{ number_format($h, 2, '.','') }}</span>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="thead tb-footer">
                                                <div class="tr d-flex" >
                                                    <div class="col-md-3 my-1">NAME</div>
                                                    <div class="col-md-3 my-1 text-right">DESCRIPTION</div>
                                                    <div class="col-md-2 my-1 text-right">HOUR</div>
                                                    <div class="col-md-2 my-1 text-right">INCREASE</div>
                                                    <div class="col-md-2 my-1 text-right">TOTAL</div>
                                                </div>
                                            </div>
                                            <div class="tbody">
                                                @php
                                                    $compensatory = [];
                                                @endphp
                                                @foreach ($employee->office->compensations as $i => $compensation)
                                                <div class="tr d-flex" >
                                                    <div class="col-md-3 my-1"> {{ $compensation->compensationType()[$compensation->type] }}</div>
                                                    <div class="col-md-3 my-1 text-right"> {{ 'Compensation' }}</div>
                                                    @if($compensation->type == 0)
                                                    <div class="col-md-2 my-1 text-right">{{ $months[$key]->sunday }} hr</div>
                                                    <div class="col-md-2 my-1 text-right">{{ $compensation->increase }} % </div>
                                                    <div class="col-md-2 my-1 text-right">
                                                        @php
                                                            $compensatory[$i] = ($months[$key]->sunday*$h)*($compensation->increase/100);
                                                        @endphp
                                                        ${{ number_format($compensatory[$i], 2, '.','') }}
                                                    </div>
                                                    @elseif($compensation->type == 1)
                                                    <div class="col-md-2 my-1 text-right">{{ $months[$key]->holiday }} hr</div>
                                                    <div class="col-md-2 my-1 text-right">{{ $compensation->increase }} % </div>
                                                    <div class="col-md-2 my-1 text-right">
                                                        @php
                                                            $compensatory[$i] = ($months[$key]->holiday*$h)*($compensation->increase/100);
                                                        @endphp
                                                        ${{ number_format($compensatory[$i], 2, '.','') }}
                                                    </div>
                                                    @else
                                                    @php
                                                        $other = ($overtime/60) - ($months[$key]->holiday + $months[$key]->sunday);
                                                    @endphp
                                                    <div class="col-md-2 my-1 text-right">{{ $other }} hr</div>
                                                    <div class="col-md-2 my-1 text-right">{{ $compensation->increase }} % </div>
                                                    <div class="col-md-2 my-1 text-right">
                                                        @php
                                                            $compensatory[$i] = ($other*$h)*($compensation->increase/100);
                                                        @endphp
                                                        ${{ number_format($compensatory[$i], 2, '.','') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                                <div class="tb-footer row" style="display:flex;">
                                                    <div class="col-md-4 my-1"></div>
                                                    <div class="col-md-4 my-1"></div>
                                                    <div class="col-md-4 my-1 text-right"><b class="font-weight-bold"> Total :</b>
                                                    
                                                        @php
                                                            $t_compensatory = array_sum($compensatory);
                                                        @endphp
                                                        ${{ number_format($t_compensatory, 2, '.','') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thead tb-footer">
                                                <div class="tr d-flex" >
                                                    <div class="col-md-4 my-1">NAME</div>
                                                    <div class="col-md-4 my-1 text-right">DESCRIPTION</div>
                                                    <div class="col-md-2 my-1 text-right">INCREASE</div>
                                                    <div class="col-md-2 my-1 text-right">TOTAL</div>
                                                </div>
                                            </div>
                                            <div class="tbody">
                                            @foreach ($employee->office->contributions as $key => $contribution)
                                                <div class="tr d-flex" >
                                                    <div class="col-md-4 my-1"> {{ $contribution['name'] }}</div>
                                                    <div class="col-md-4 my-1 text-right"> {{ $contribution['description'] }}</div>
                                                    <div class="col-md-2 my-1 text-right"> % {{ $contribution['rate'] }}</div>
                                                    <div class="col-md-2 my-1 text-right">
                                                        @php
                                                            $basic = $employee->salary;
                                                            $contribute = ($basic*$contribution['rate'])/100;
                                                        @endphp
                                                        ${{ number_format($contribute, 2, '.','') }}
                                                    </div>
                                                </div>
                                            @endforeach

                                                <div class="tb-footer row" style="display:flex;">
                                                    <div class="col-md-4 my-1 text-right"></div>
                                                    <div class="col-md-4 my-1 text-right"></div>
                                                    <div class="col-md-4 my-1 text-right"><b class="font-weight-bold"> Total :</b>
                                                   
                                                        @php
                                                            $rate = $employee->office->contributions()->sum('rate');
                                                            $contribute = ($basic*$rate)/100;
                                                        @endphp
                                                        -${{ number_format($contribute, 2, '.','') }}
                                                    </div>
                                                </div>
                                                <div class="tb-footer row" style="display:flex;">
                                                    <div class="col-md-4 my-1 text-right"></div>
                                                    <div class="col-md-4 my-1 text-right"></div>
                                                    <div class="col-md-4 my-1 text-right"><b class="font-weight-bold">Gross Total :</b>
                                                   
                                                        @php
                                                            $total = ($employee->salary + $t_compensatory) - $contribute;
                                                            
                                                        @endphp
                                                        ${{ number_format($total, 2, '.','') }}
                                                    </div>
                                                </div>
                                                @if(!$paid)
                                                <div class="tb-footer row justify-content-end " style="display:flex;">
                                                    <div class="m-2">
                                                        <a href="{{ url('salary/payment/'.$employee->id.'-'.$month_year) }}" class="btn btn-secondary">Pay Salary</a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
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
            dataTableInit();
        });
    })(jQuery);
</script>
@endsection
</body>

</html>