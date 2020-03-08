@extends('layouts.admin.master')
@section('title', 'Attendance')
@section('admin-additional-css')
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
<!-- Bootstrap Core CSS -->
 <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
 <link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
 <link href="{{ asset('admin/assets/plugins/wizard/steps.css') }}" rel="stylesheet">
 <link href="{{ asset('admin/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
 <link href="{{ asset('admin/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">

 <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
             <div class=" table-responsive m-t-40">           
                <section>   
                    {{-- <table id="example" class="display datatable table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target > --}}
                    <table id="" class="display table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                        <thead>
                            <tr>
                                <th> Employee</th>
                                <th> Date</th>
                                <th> Office In Time</th>
                                <th> Office Out Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('employees.attendance.set') }}" method="post">
                                @csrf
                                <tr>
                                    <td style="left: 37px;">                                    
                                        <select class="form-control custom-select" id="custom-select" name="employee">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" id="date" class="form-control" name="date">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="time_in" value="09:00">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="left: 37px;">
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" name="time_out" value="18:00">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </div>
                                    
                                    </td>
                                
                                    <td><button class="btn btn-primary">Save</button></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                    <table id="" class="display table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                        <thead>
                            <tr>
                                <th> Date</th>
                                <th> Weekday</th>
                                <th> Office In Time</th>
                                <th> Office Out Time</th>
                                <th> In Office</th>
                                <th>Breaktime</th>
                                <th>Working hour</th>
                            </tr>
                        </thead>
                        <tbody id="employee-attendance">
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
<script src="{{ asset('admin/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script src="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->

<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        $('#date').daterangepicker({
            singleDatePicker: true,
            // autoApply:true,
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            },
            callback: function (start, end, period) {
                $(this).val(start);
            }
        });

        $('#custom-select').change(function(){
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('employees/attendance/get/') }}/"+id,
                success:function(data){
                    let html = '';
                    $.each(data.attendance, function(month, value) {
                        let m = `<tr style="border-bottom:2pt solid #212529;"><td colspan="7" style='text-align:center;vertical-align:middle;font-weight:600;font-size:16px;'>`+month+`</td></tr>`;
                        $('#employee-attendance').append(m);
                        $.each(value, function(index, value) {
                            let office_duration = moment.duration(moment(value.end_time, [moment.ISO_8601, 'HH:mm']).diff(moment(value.start_time, [moment.ISO_8601, 'HH:mm']))).asMinutes();
                            let breaktime = value.break_time.split(":");


                            let duration =moment.duration(moment(value.pivot.out_time).diff(moment(value.pivot.in_time))).asMinutes();
                            let hour = Math.floor(duration/60);
                            let minutes = duration%60;

                            b_hour = 0;
                            b_minute = 0;
                            if(minutes<breaktime[1]){
                                b_minute = (minutes-breaktime[1])+60;
                                b_hour = (hour-breaktime[0])-1;
                            }else{
                                b_minute = minutes-breaktime[1];
                                b_hour = hour-breaktime[0];
                            }
                            html += `<tr>
                                <td>
                                    `+moment(value.pivot.date).format('MMMM-DD YYYY')+`
                                </td>
                                <td>
                                    `+moment(value.pivot.date).format('dddd')+`
                                </td>
                                <td>
                                    `+moment(value.pivot.in_time).format('hh:mm A')+`
                                </td>
                                <td>
                                    `+moment(value.pivot.out_time).format('hh:mm A')+`
                                </td>
                                <td>
                                    `+hour+`:`+minutes+` Hr
                                </td>
                                <td>
                                    `+value.break_time+` Hr
                                </td>
                                <td>
                                    `+b_hour+`:`+b_minute+` Hr
                                </td>
                            </tr>`;
                        });
                        $('#employee-attendance').append(html);
                    });
                }
            });
        });
    });
    </script>
@endsection
</body>

</html>