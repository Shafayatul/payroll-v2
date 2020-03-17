@extends('layouts.admin.master')
@section('title', 'Roles')
@section('admin-additional-css')
@endsection
@section('content')
<div class="page-content">
    <!-- BEGIN PAGE BREADCRUMB -->
    {{-- <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('user.index') }}">Users</a>
        </li>
        <li class="active">Roles</li>
    </ul> --}}
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    {{-- <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">List Of User Roles</span>
                    </div> --}}
                    <div class="d-flex justify-content-end">
                        <a data-toggle="modal" href="#add" class="btn btn-primary m-3 sbold red" data-backdrop="static" data-keyboard="false">Add New Role</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th class="no-sort" style="width:10%;">SL.</th>
                                <th style="width:25%;">Name</th>
                                <th style="width:50%;">Slug</th>
                                <th class="no-sort" style="width:15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $i=>$role)
                            <tr class="odd gradeX">
                                
                                <td>{{ $i+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a> {{ $role->slug }} </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a data-toggle="modal" href="#view{{ $role->id }}" class="btn green btn-xs" data-backdrop="static" data-keyboard="false">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a data-toggle="modal" href="#edit{{ $role->id }}" class="btn blue btn-xs" data-backdrop="static" data-keyboard="false">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" href="#delete{{ $role->id }}" class="btn red btn-xs" data-backdrop="static" data-keyboard="false">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>

                                {{-- Modal View   --}}
                                <div class="modal fade bs-modal-lg" id="view{{$role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                                                    <i class="fas fa-times font-red"></i>
                                                </button>
                                                <h4 class="modal-title">Role Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default borderless">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><b>Full Name</b></p>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <p><b>:</b></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $role->name }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><b>Slug</b></p>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <p><b>:</b></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $role->slug }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title text-center">Permissions</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                @foreach ($role->permissions as $item)
                                                                    <div class="col-md-4 role-permissions">
                                                                        <p><i class="far fa-check-square font-red"></i> {{ $item->name }}</p>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn red btn-outline" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Edit Modal --}}
                                <div class="modal fade bs-modal-lg" id="edit{{ $role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('employees.roles.update', $role->id) }}" class="horizontal-form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                                                        <i class="fas fa-times font-red"></i>
                                                    </button>
                                                    <h4 class="modal-title">Edit Role</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="slug">Role Name</label>
                                                                    <span class="font-red">*</span>
                                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name}}" required>
                                                                    {{-- <input type="text" id="slug" name="slug" class="form-control" value="{{ $role->slug}}" required> --}}
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label" for="name">Display Number</label>
                                                                    <span class="font-red">*</span>
                                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name}}" required>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel panel-default borderless">
                                                                    <div class="panel-heading text-center">Edit Permissions</div>
                                                                    <div class="panel-body">
                                                                        @foreach ($permissions as $permission)
                                                                        <div class="col-md-4">
                                                                            <label>
                                                                                <input id="permission{{ $i }}" name="permission[]" value="{{$permission->id}}" type="checkbox"
                                                                                    @if($role->permissions->contains($permission))checked @endif>
                                                                                <span>{{ $permission->name }}</span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel panel-default borderless">
                                                                    <div class="panel-heading text-center">Update Users for this role</div>
                                                                    <div class="panel-body">
                                                                        @foreach ($users as $user)
                                                                        <div class="col-md-4">
                                                                            <label>
                                                                                <input id="user{{ $i }}" name="user[]" value="{{$user->id}}" type="checkbox"
                                                                                    @if($role->users->contains($user))checked @endif>
                                                                                <span>{{ $user->name }}</span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn blue btn-outline">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                {{-- Delete Modal   --}}
                                <div class="modal fade bs-modal-md" id="delete{{$role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <form action="{{route('employees.roles.destroy', $role->id)}}" class="horizontal-form" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                                                        <i class="fas fa-times font-red"></i>
                                                    </button>
                                                    <h4 class="modal-title">Delete this entry</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="font-red">
                                                        <strong>Warning!</strong> Are you sure you want to delete this Record?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red btn-outline" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                                                    <button type="submit" class="btn blue btn-outline">Yes <i class="fas fa-check"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </tr>                                                    
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
{{-- Add Modal --}}
<div class="modal fade bs-modal-lg" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('employees.roles.store') }}" class="horizontal-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                        <i class="fas fa-times font-red"></i>
                    </button>
                    <h4 class="modal-title">Add Role</h4>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Role Name</label>
                                    <span class="font-red">*</span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Display Name" required>
                                    {{-- <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug Name" required> --}}
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Display Number</label>
                                    <span class="font-red">*</span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Dispplay Name" required>
                                </div>
                            </div> --}}
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default borderless">
                                    <div class="panel-heading text-center">Select Permissions</div>
                                    <div class="panel-body">
                                        @foreach ($permissions as $i => $permission)
                                        <div class="col-md-4">
                                            <label>
                                                <input type="checkbox" id="permission{{ $i }}" name="permission[]" value="{{$permission->id}}">
                                                <span>{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default borderless">
                                    <div class="panel-heading text-center">Select User</div>
                                    <div class="panel-body">
                                        @foreach ($users as $i => $user)
                                        <div class="col-md-4">
                                            <label>
                                                <input type="checkbox" id="user{{ $i }}" name="user[]" value="{{$user->id}}">
                                                <span>{{ $user->name }} </span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn blue btn-outline">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- /.Modal Add --}}
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">

</script>
@endsection