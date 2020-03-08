@extends('layouts.admin.master')
@section('title', 'Employee Absences')
@section('admin-additional-css')
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
<link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('admin/assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" rel="stylesheet">
 

 {{-- <link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all"> --}}
@endsection
@section('content')
    @include('layouts.admin.include.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="mb-0 text-white">Employee Absences</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.absence.set') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">Absence Form</h3>
                            <hr>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Employee</label>
                                        <select class="form-control custom-select" id="custom-select" name="employee">
                                            <option value="">Select Employee </option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-control-feedback"> Select employee </small> 
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Absence Type</label>
                                        <select class="form-control custom-select" id="custom-select" name="absence">
                                            <option value="">Select Absence </option>
                                            @foreach ($absences as $absence)
                                            <option value="{{ $absence->id }}">{{ $absence->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-control-feedback"> Select Absence type </small> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Absence from</label>
                                        <input type="text" id="absence_from" name="absence_from" class="form-control" placeholder="Absence from">
                                        <small class="form-control-feedback"> This field has error. </small> 
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Absence to</label>
                                        <input type="text" id="absence_to" name="absence_to" class="form-control" placeholder="Absence to">
                                        <small class="form-control-feedback"> This field has error. </small> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-success">
                                        <label class="control-label">Cause of absence</label>
                                        <textarea name="reason" rows="3" class="form-control" placeholder="Cause of absence"></textarea>
                                        <small class="form-control-feedback"> Cause of absence </small> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class=" table-responsive m-t-40">           
        <section>   
            <table id="" class="display table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                <thead>
                    <tr>
                        <th> Absence type</th>
                        <th> Absence from</th>
                        <th> Absence to</th>
                        <th> Days</th>
                        <th> Reasons</th>
                    </tr>
                </thead>
                <tbody id="employee-absence">
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
<script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<!-- Date range Plugin JavaScript -->

<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#absence_from').daterangepicker({
            singleDatePicker: true,
            autoApply:true,
            timePicker: true,
            showDropdowns:true,
            locale: {
                format: 'MM-DD-YYYY h:mm A'
            },
            callback: function (start, end, period) {
                $(this).val(start);
            }
        });
        $('#absence_to').daterangepicker({
            singleDatePicker: true,
            autoApply:true,
            timePicker: true,
            locale: {
                format: 'MM-DD-YYYY h:mm A'
            },
            callback: function (start, end, period) {
                $(this).val(start);
                console.log(start);
            }
        });

        $('#custom-select').change(function(){
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('employees/absence/get/') }}/"+id,
                success:function(data){
                    let html = '';
                    $.each(data.absences, function(i, month) {
                        let m = `<tr style="width:90% !important;border-bottom:2pt solid #212529;"><td colspan="7" style='text-align:center;vertical-align:middle;font-weight:600;font-size:16px;'>`+i+`</td></tr>`;
                        html += m;
                        // $('#employee-absence').append(m);
                        $.each(month, function(index, value) {
                            html += `<tr style="width:90%; !important">
                                <td>
                                    `+value.name+`
                                </td>
                                <td>
                                    `+moment(value.pivot.absence_from).format('MM-DD-YYYY hh:mm A')+`
                                </td>
                                <td>
                                    `+moment(value.pivot.absence_to).format('MM-DD-YYYY hh:mm A')+`
                                </td>
                                /* value.pivot.absence_to.diff(value.pivot.absence_from, 'days') */
                                <td>
                                    `+parseInt(parseInt(1)+parseInt(moment(value.pivot.absence_to).diff(moment(value.pivot.absence_from), 'days')))+`
                                </td>
                                <td>
                                    `+value.pivot.reason+`
                                </td>
                            </tr>`;
                        });
                        $('#employee-absence').append(html);
                    });
                }
            });
        });
    });
    </script>
@endsection
</body>

</html>