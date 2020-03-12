@extends('layouts.admin.master')
@section('title', 'Contribution')
@section('admin-additional-css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endsection
@section('content')
{{-- @include('layouts.admin.include.alert') --}}
<div class="row justify-content-end">
    <div class="form-group">
        <div class="col-md-12 mr-25">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#compensationCreate" data-whatever="@mdo">Create Contribution</button>
            <div class="modal" id="compensationCreate" tabindex="-1" role="dialog" aria-labelledby="compensationCreateLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="attributeCreateLabel"> Create Contribution</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="complete" action="{{ route('contribution.store') }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                <div class="row">
                                    <label class="control-group" for="name">Contribution name</label>
                                    <div class="form-group col-md-12">
                                        <input type="text"class="form-control" name="name" id="name">
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
                                    <label for="rate">Contribution Rate (%)</label>
                                    <div class="form-group col-md-12">
                                        <input type="text" max="100" min="0" class="form-control" name="rate" id="rate">
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
                        <th> Name</th>
                        <th> Rate</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contributions as $contribution)
                    <tr>
                        <td>
                            <div class="input-group">
                                {{ $contribution->offices->name }}
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ $contribution->name }}
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ $contribution->rate }}%
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#contributionCreate{{$contribution->id}}" data-whatever="@mdo">Update</button>
                            <div class="modal" id="contributionCreate{{$contribution->id}}" tabindex="-1" role="dialog" aria-labelledby="contributionCreateLabel{{$contribution->id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="attributeCreateLabel{{$contribution->id}}"> Update contribution</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="complete" action="{{ route('contribution.update') }}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $contribution->id }}">
                                                <div class="row">
                                                    <label class="control-group" for="name">Mutuality name</label>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" value="{{ $contribution->name }}" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <select class="select-chosen form-control" name="office">
                                                            <option value="" disabled selected>Select Office</option>
                                                            @foreach ($company->offices as $office)
                                                            <option value="{{ $office->id }}" {{ $contribution->office_id == $office->id ? 'selected':''}}>{{ $office->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="rate">Contribution Rate (%)</label>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" max="100" min="0" class="form-control" value="{{ $contribution->rate }}" name="rate" id="rate">
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