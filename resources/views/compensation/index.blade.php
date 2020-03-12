@extends('layouts.admin.master')
@section('title', 'Compensation')
@section('admin-additional-css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endsection
@section('content')
{{-- @include('layouts.admin.include.alert') --}}
<div class="row justify-content-end">
    <div class="form-group">
        <div class="col-md-12 mr-25">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#compensationCreate" data-whatever="@mdo">Create Compensation</button>
            <div class="modal" id="compensationCreate" tabindex="-1" role="dialog" aria-labelledby="compensationCreateLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="attributeCreateLabel"> Create Overtime compensation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="complete" action="{{ route('overtime.store') }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                <div class="row">
                                    <label class="control-group" for="type">Compensation type</label>
                                    <div class="form-group col-md-12">
                                        <select class="select-chosen form-control" name="type" id="type">
                                            @foreach ($company->compensationType() as $key => $compensation)
                                            <option value="{{ $key }}">{{ $compensation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <select class="select-chosen form-control" name="office">
                                            <option value="" disabled selected>Select Office</option>
                                            @foreach ($company->offices as $office)
                                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="increase">Compensatory Increase Rate (%)</label>
                                    <div class="form-group col-md-12">
                                        <input type="number" max="100" min="0" class="form-control" name="increase" id="increase">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="submit" class="btn btn-primary float-right">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class=" table-responsive m-t-40">           
        <section>   
            <table id="compensation" class="display table table-bordered table-striped table-hover" data-table-source="" data-table-filter-target >
                <thead>
                    <tr>
                        <th> Office</th>
                        <th> Type</th>
                        <th> Increase</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compensations as $compensation)
                    <tr>
                        <td>
                            <div class="input-group">
                                {{ $compensation->offices->name }}
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ $compensation->compensationType()[$compensation->type] }}
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ $compensation->increase }}%
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#compensationCreate{{$compensation->id}}" data-whatever="@mdo">Update</button>
                            <div class="modal" id="compensationCreate{{$compensation->id}}" tabindex="-1" role="dialog" aria-labelledby="compensationCreateLabel{{$compensation->id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="attributeCreateLabel{{$compensation->id}}"> Update Overtime compensation</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="complete" action="{{ route('overtime.store') }}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                <div class="row">
                                                    <label class="control-group" for="type">Compensation type</label>
                                                    <div class="form-group col-md-12">
                                                        <select class="select-chosen form-control" name="type" id="type">
                                                            @foreach ($company->compensationType() as $key => $compensatory)
                                                            <option value="{{ $key }}" {{ $compensation->type == $key ? 'selected':''}}>{{ $compensatory }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <select class="select-chosen form-control" name="office">
                                                            <option value="" disabled selected>Select Office</option>
                                                            @foreach ($company->offices as $office)
                                                            <option value="{{ $office->id }}" {{ $compensation->office_id == $office->id ? 'selected':''}}>{{ $office->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="increase">Compensatory Increase Rate (%)</label>
                                                    <div class="form-group col-md-12">
                                                        <input type="number" max="100" min="0" class="form-control" value="{{ $compensation->increase }}" name="increase" id="increase">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" id="submit" class="btn btn-primary float-right">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready({
        $('#compensation').datatable();
    });
</script>
@endsection