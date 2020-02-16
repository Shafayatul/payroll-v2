@extends('layouts.admin.master')
@section('title', 'Employee Roles')
@section('admin-additional-css')
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
<link href="{{ asset('admin/css/employee-role.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
    @include('layouts.admin.include.alert')
    <div class="shadowed-box">
        <div class="row gutter30 ml-0">
            <div class="col-md-4 ">
                <div class="block-section customvtab vtabs row">
                <h4 class="sub-header">Roles</h4>
                    <ul id="roles_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" role="tablist">
                        @foreach($roles as $role)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->iteration == 1? 'active':'' }}" data-toggle="tab" href="#tab{{$role->id}}" role="tab"> {{ $role->name }} <span class="badge pull-right">{{count($role->users)}}</span></a> 
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8 tab-content">
                @foreach($roles as $role)
                <div class="block-section tab-pane {{ $loop->iteration == 1? 'active':'' }}" id="tab{{$role->id}}" role="tabpanel">
                    <h4 class="sub-header">
                        <span class="js-role-header role-name role-186826">{{ $role->name }}</span> Role
                        <span class="js-role-actions">
                            <a class="js-role-delete-link margin-left-5 pull-right text-muted" data-toggle="modal" data-role-id="186826" data-modal-href="#modal-delete-role" data-not-allowed-title="Role cannot be deleted, because it still contains employees" data-title="Delete this role" data-test-id="delete-role-button" style="cursor: not-allowed; font-weight: normal;">
                                <i class="js-role-delete-icon far fa-trash" data-toggle="tooltip" data-original-title="" title=""></i>
                            </a>
                            <a href="#" class="js-role-duplicate-link duplicate-role margin-left-5 pull-right" data-role-id="186826" data-test-id="duplicate-role-button">
                                <i class="far fa-copy" data-toggle="tooltip" title="" data-original-title="Duplicate role including access rights and reminder settings"></i>
                            </a>
        
                            <a href="#modal-edit-role" class="js-role-edit-link pull-right" data-toggle="modal" data-role-id="186826" data-test-id="edit-role-button">
                                <i class="far fa-pencil" data-toggle="tooltip" title="" data-original-title="Edit this role's name"></i>
                            </a>
                        </span>
                    </h4>
                    <ul class="nav nav-pills mb-3 roles" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ $category == 'members'? 'active':''}}" id="pills-member-tab{{$role->id}}" data-toggle="pill" href="#roles-member{{$role->id}}" role="tab" aria-controls="roles-member{{$role->id}}" aria-selected="{{ $category == 'members'? 'true':'false'}}">
                                Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $category == 'rights'? 'active':''}}" id="pills-rights-tab{{$role->id}}" data-toggle="pill" href="#roles-rights{{$role->id}}" role="tab" aria-controls="roles-rights{{$role->id}}" aria-selected="false">
                                Access rights
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $category == 'reminders'? 'active':''}}" id="roles-reminders-tab{{$role->id}}" data-toggle="pill" href="#roles-reminders{{$role->id}}" role="tab" aria-controls="roles-reminders{{$role->id}}" aria-selected="false"> 
                                Reminders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $category == 'calendars'? 'active':''}}" id="roles-calendars-tab{{$role->id}}" data-toggle="pill" href="#roles-calendars{{$role->id}}" role="tab" aria-controls="roles-calendars{{$role->id}}" aria-selected="false">
                                Calendars
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $category == 'security'? 'active':''}}" id="roles-security-tab{{$role->id}}" data-toggle="pill" href="#roles-security{{$role->id}}" role="tab" aria-controls="roles-security{{$role->id}}" aria-selected="false">
                                Security
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tab Content">
                        <div class="tab-pane {{ $category == 'members'? 'active':'fade'}}" id="roles-member{{$role->id}}" role="tabpanel" aria-labelledby="roles-member-tab{{$role->id}}">
                            <form class="update-members" id="update-members{{$role->id}}" action="{{ route('roles.update.members') }}" method="post">
                                @csrf
                                @method('POST')
                                <select multiple="multiple" size="10" data-id="{{ $role->id }}" size="10" id="user-role-{{$role->id}}" name="users[]" title="Select members/employees">
                                    @foreach (Auth::user()->office->users as $user)
                                        <option value="{{$user->id}}" {{ $role->users->contains($user) ? 'selected':'' }}>{{$user->name}}, {{$user->departments->name}}</option>
                                    @endforeach
                                </select>
                                @php $role_id = new \Hashids\Hashids(); @endphp
                                <input type="hidden" name="role" value="{{ $role_id->encode($role->id) }}">
                                <div class="submit-buttons-wrapper">
                                    <div class="col-md-12 pull-left">
                                        <button type="submit" class="btn btn-primary"> <i class="fas fa-arrow-right"></i> Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane {{ $category == 'rights'? 'active':'fade'}}" id="roles-rights{{$role->id}}" role="tabpanel" aria-labelledby="roles-rights-tab{{$role->id}}">
                            <form id="update-rights{{$role->id}}" action="{{ route('roles.update.rights') }}" method="post">
                                @csrf
                                @method('POST')    
                                @foreach ($sections as $section)
                                    <table class="table accordion" id="accordionExample{{$section->id}}">
                                    <thead class="#" data-toggle="collapse" data-target="#section{{$section->id}}" role="button" aria-expanded="false" data-parent="#accordionExample{{$section->id}}"aria-controls="section{{$section->id}}">
                                        <tr style="background: #eee;">
                                            <th> 
                                                <a href="#">
                                                    <i class="fas fa-caret-right"></i> &nbsp;
                                                    <b>{{ $section->name }}</b> 
                                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-title="Access rights for the section 'Actions > Manage Account' in the employee profile" data-original-title="" title=""></i> 
                                                </a>
                                            </th>
                                            @foreach($permission->permissionMeta() as $meta)
                                            <th  width="20%"> 
                                                {{ $meta }}<i class="fas fa-info-circle" data-toggle="tooltip" data-title="Role members can reset their own password and see the account status (e.g. last login) of other users, if the view right is granted for 'Team' or 'All'." data-original-title="" title="{{ $meta }}"></i> 
                                            </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    @foreach ($section->employeeDetailAttributes as $attribute)                                    
                                    <tbody class="collapse" id="section{{$section->id}}">
                                        <tr class="right-group">                                     
                                            <td class="view-right">
                                                {{ $attribute->name }}
                                            </td>
                                        @foreach ($permission->permissionMeta() as $key => $meta)
                                            <td class="view-right">                                           
                                            @foreach($permission->permissionAccessType() as $accessKey => $value)
                                                @php
                                                    $id = $attribute->id;
                                                    $check = $role->permissions()->where('permission_key', $key)->where('access_type', $accessKey)
                                                                ->whereHas('rules', function($r) use($id){
                                                                    $r->where('attribute_id', $id);
                                                                })->first();
                                                @endphp
                                                <div class="custom">
                                                    <input type="checkbox" {{ (null !== $check) ? 'checked' : ''}} class="form-check-input" id="permission_{{$role->id}}_{{$attribute->id}}_{{$key}}_{{$accessKey}}" name="permission{{'_'.$role->id}}[{{'attr_'.$attribute->id}}][{{'meta_'.$key}}][{{'access_'.$accessKey}}]" value="1"> <label class="form-check-label" for="permission_{{$role->id}}_{{$attribute->id}}_{{$key}}_{{$accessKey}}" class="checkbox-label"> {{ $value }}</label>
                                                </div>
                                            <br>
                                            @endforeach
                                            </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                    @endforeach
                                  </table>
                                @endforeach
                                <input type="hidden" name="role" value="{{ $role_id->encode($role->id) }}">
                                <div class="submit-buttons-wrapper">
                                    <div class="col-md-12 pull-left">
                                        <button type="submit" class="btn btn-primary"> <i class="fas fa-arrow-right"></i> Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane {{ $category == 'reminders'? 'active':'fade'}}" id="roles-reminders{{$role->id}}" role="tabpanel" aria-labelledby="roles-reminders{{$role->id}}">
                            <p>
                                The following reminders will be added automatically for every employee with this role.
                            </p>
                            @foreach($role->reminders as $reminder)
                            @php 
                                $reminder_id = new \Hashids\Hashids();
                                $reminder_id = $reminder_id->encode($reminder->id);
                            @endphp
                            <div class="reminder box">
                                Remind 
                                <span>
                                    {{ $reminder->reminds->name }} 
                                </span>
                                <br> about 
                                <span class="highlight">
                                    {{ $reminder->roleRemindAbout()[$reminder->about_key] }} 
                                </span>
                                <br> of 
                                <span>
                                    {{ $reminder->roleReminderFilterType()[$reminder->filter_type] }} 
                                    <small>*</small>
                                </span>
                                <span> on {{ $reminder->automatic_offset }} {{ null !== $reminder->automatic_offset_unit ? $reminder->offsetUnit()[$reminder->automatic_offset_unit] : '' }} {{ null !== $reminder->automatic_offset_sign ? $reminder->offsetSign()[$reminder->automatic_offset_sign] : '' }}</span>
                                <a href="#modalEditReminder{{ $reminder_id }}" data-toggle="modal">
                                  <i class="fas fa-pencil-alt" data-toggle="tooltip" data-title="Edit reminder" data-original-title="" title=""></i>
                                </a>
                                <div id="modalEditReminder{{ $reminder_id }}" class="modal"  role="dialog" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit reminder</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>              
                                            </div>                                  
                                            <form action="{{ route('roles.update.reminder') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="alert alert-info"> 
                                                        Changes made after 5:00 am CET will take effect starting from the next day. 
                                                    </div>
                                                    <input type="hidden" name="reminder" value="{{ $reminder_id }}">
                                                    <div class="form-group  row">
                                                            <label class="col-md-3 control-label"> about </label>
                                                        <div class="col-md-8">
                                                            <select class="form-control aboutSelect"  name="role_about">
                                                                <option value="" disabled>Please select...</option>
                                                                @foreach ($role->roleRemindAbout() as $key => $remind)
                                                                <option value="{{ $key }}" {{ $reminder->about_key == $key? 'selected' : '' }}>{{ $remind }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row filter-type">
                                                        <label class="col-md-3 control-label"> of 
                                                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="The term &quot;All employees&quot; refers to all employees for whom you have view rights regarding the selected attribute. <br/>The term &quot;Own Team&quot; in Personio refers to and includes all the employees who share the same (direct or indirect) supervisor.<br>However, &quot;Direct Team&quot; includes only the employees who share the same direct supervisor."></i> 
                                                        </label>
                                                        <div class="col-md-8">
                                                            <select class="form-control custom-select edit-filter-type" data-role="{{ $role->id }}" data-reminder="{{ $reminder_id }}" name="filter_type" data-id="{{$role->id}}">
                                                                @foreach ($role->roleReminderFilterType() as $key => $filter)
                                                                <option value="{{ $key }}" {{ $reminder->filter_type == $key? 'selected' : '' }}>{{ $filter }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row special-type mt-2" id="edit-{{ $role->id }}-special-{{ $reminder_id }}">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-8">
                                                            <div class="edit-filter-container" id="edit{{ $role->id }}-filter{{ $reminder_id }}container">
                                                                @if(!$reminder->specialrole->isEmpty())
                                                                @foreach ($reminder->specialrole as $special)
                                                                @php
                                                                    $unique = \Str::random(16);
                                                                @endphp
                                                                <div class="form-group row" id="delete-{{$role->id}}-filter-{{ $unique }}">
                                                                    <div class="input-group col-md-5">
                                                                        <select class="form-control edit-select-filter" name="filter_attr[]" data-role="{{$role->id}}" id="select-{{ $role->id }}-attr-{{ $unique }}" data-reminder="{{ $reminder_id }}" data-unique="{{ $unique }}">
                                                                            @foreach($attributes as $attribute)
                                                                            <option id="attr-{{$attribute->id}}" data-attr="{{ $attribute->name }}" value="{{ $attribute->id }}" {{ $attribute->id == $special->attribute_id ? 'selected':'' }}>{{ $attribute->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-group-append col-md-5" id="edit-input-{{$role->id}}-filter-{{ $unique }}">
                                                                        <input class="form-control" placeholder="{{ $attribute->id }}" required="" name="filter_value[{{ $attribute->id }}]" type="text" value="{{ $special->value }}" required>
                                                                    </div>
                                                                    <div class="clear col-md-1">
                                                                        <button class="btn" type="button" data-role="{{ $role->id }}" data-unique="{{$unique}}" onclick="deleteFilter({{ $role->id }},'{{ $unique }}');"><i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                                <span id="another-{{$role->id}}-container-{{ $reminder_id }}"></span>
                                                            </div>
                                                            <a class="another-add-filter" data-role="{{$role->id}}" data-reminder="{{ $reminder_id }}"  href="#add-another-filter"><i class="fas fa-plus-circle"></i> Add filter </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="margin-top:10px !important;">
                                                        <label class="col-md-3 control-label"> when </label>
                                                        <div class="col-md-2"> 
                                                            <input class="form-control required" number="" name="automatic_offset" type="text" value="4"> 
                                                        </div>
                                                        <div class="col-md-3"> 
                                                            <select class="form-control valid" name="automatic_offset_unit">
                                                                <option value=""></option>
                                                                @foreach ($role->offsetUnit() as $key => $unit)
                                                                    <option value="{{ $key }}" {{ $reminder->automatic_offset_unit == $key? 'selected':'' }}>{{ $unit }}</option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                        <div class="col-md-3"> 
                                                            <select class="form-control" name="automatic_offset_sign">
                                                                <option value=""></option>
                                                                @foreach ($role->offsetSign() as $key => $sign)
                                                                <option value="{{ $key }}" {{ $reminder->automatic_offset_sign == $key? 'selected':'' }}>{{ $sign }}</option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            @php
                                                                $uni = \Str::random(6);
                                                            @endphp
                                                            <div class="custom-control custom-radio show">
                                                                <input type="radio" class="custom-control-input" id='staked-{{'r'.$uni}}' name="radio_stacked" value="1" checked required>
                                                                <label class="custom-control-label" for='staked-{{'r'.$uni}}'>Reminder (automated expiration)</label>
                                                            </div>                             
                                                            <div class="custom-control custom-radio mb-3 d-hide">
                                                                <input type="radio" class="custom-control-input" id="staked-{{'t'.$uni}}" name="radio_stacked" value="1" required>
                                                                <label class="custom-control-label" for="staked-{{'t'.$uni}}">Task (no expiration)</label>                                     
                                                            </div>                              
                                                            <div id="reminder" >
                                                                Please note that reminders that are triggered before the event, will disappear from the dashboard
                                                                <strong>one day</strong> after the event. 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $uni = \Str::random(6); @endphp
                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label"> Frequency </label>
                                                        <div class="col-md-8 form-control-static">
                                                            <input name="automatic_yearly" id="{{$uni}}" type="checkbox" value="1" {{$reminder->is_yearly == 1? 'checked':''}}> <label for="{{$uni}}">Yearly reminder</label>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Note</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" placeholder="Optional description..." name="title" type="text" value="{{ $reminder->title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" >Edit</button>
                                                </div>
                                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <a href="#modal-delete-reminder{{ $reminder_id }}" data-toggle="modal" data-reminder-id="{{ $reminder_id }}" class="text-danger">
                                    <i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete reminder" data-original-title="" title=""></i>
                                </a>
                                <div id="modal-delete-reminder{{ $reminder_id }}" class="modal" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('roles.delete.reminder') }}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Warning</h4>
                                                </div>
                                                <input type="hidden" name="reminder" value="{{ $reminder_id }}">
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this reminders?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-default">Proceed</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3"> 
                                    <strong>Expiration date:</strong> one day after <i>{{ $reminder->roleRemindAbout()[$reminder->about_key] }}</i> 
                                </div>
                            </div>
                            @endforeach
                            <a href="#modalAddReminder" data-toggle="modal"  class="btn btn-sm btn-primary"> Add reminder </a>
                            <p class="margin-top-20">* all employees for whom you have view rights regarding the selected attributes.</p>
                            <div id="modalAddReminder" class="modal"  role="dialog" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add reminder</h3></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>              
                                        </div>                                  
                                        <form action="{{ route('roles.store.reminder') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-body">
                                                <div class="alert alert-info"> 
                                                    Changes made after 5:00 am CET will take effect starting from the next day. 
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 control-label"> Remind </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control remindSelect" name="role_reminds">
                                                            <option value="">Please select...</option>
                                                            @foreach ($roles as $role_list)
                                                            <option value="{{ $role_list->id }}">{{ $role_list->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-md-3 control-label"> about </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control reminderSelect" name="role_about">
                                                            <option value="">Please select...</option>
                                                            @foreach ($role->roleRemindAbout() as $key => $remind)
                                                            <option value="{{ $key }}">{{ $remind }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row filter-type">
                                                    <label class="col-md-3 control-label"> of 
                                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="The term &quot;All employees&quot; refers to all employees for whom you have view rights regarding the selected attribute. <br/>The term &quot;Own Team&quot; in Personio refers to and includes all the employees who share the same (direct or indirect) supervisor.<br>However, &quot;Direct Team&quot; includes only the employees who share the same direct supervisor."></i> 
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control custom-select add-filter-type" name="filter_type" data-id="{{$role->id}}">
                                                            @foreach ($role->roleReminderFilterType() as $key => $filter)
                                                            <option value="{{ $key }}">{{ $filter }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row special-type mt-2" id="special_{{$role->id}}" style="display:none;">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-8">
                                                        <span class="addFilterContainer" id="addFilterContainer-{{$role->id}}"> </span>
                                                        <a class="add-filter" data-role="{{ $role->id }}" href="#add-filter"><i class="fas fa-plus-circle"></i> Add filter </a>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-top:10px !important;">
                                                    <label class="col-md-3 control-label"> when </label>
                                                    <div class="col-md-2"> 
                                                        <input class="form-control required" number="" name="automatic_offset" type="text" value="4"> 
                                                    </div>
                                                    <div class="col-md-3"> 
                                                        <select class="form-control valid" name="automatic_offset_unit">
                                                            <option value=""></option>
                                                            @foreach ($role->offsetUnit() as $key => $unit)
                                                            <option value="{{ $key }}">{{ $unit }}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-3"> 
                                                        <select class="form-control" name="automatic_offset_sign">
                                                            <option value=""></option>
                                                            @foreach ($role->offsetSign() as $key => $sign)
                                                            <option value="{{ $key }}">{{ $sign }}</option>
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                </div>
                                                @php $uni = \Str::random(6); @endphp
                                                <div class="form-group row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <div class="custom-control custom-radio show">
                                                            <input type="radio" class="custom-control-input" id="expiration-type-reminder-{{ 'r'.$uni }}" name="radio_stacked" checked required>
                                                            <label class="custom-control-label" for="expiration-type-reminder-{{ 'r'.$uni }}">Reminder (automated expiration)</label>
                                                        </div>                             
                                                        <div class="custom-control custom-radio mb-3 d-hide">
                                                            <input type="radio" class="custom-control-input" id="expiration-type-task-{{ 't'.$uni }}" name="radio_stacked" required>
                                                            <label class="custom-control-label" for="expiration-type-task-{{ 't'.$uni }}">Task (no expiration)</label>                                     
                                                        </div>                              
                                                        <div id="reminder" >
                                                            Please note that reminders that are triggered before the event, will disappear from the dashboard
                                                            <strong>one day</strong> after the event. 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 control-label"> Frequency </label>
                                                    <div class="col-md-8 form-control-static">
                                                        <input name="automatic_yearly" id="is-yearly-{{ $role->id }}" type="checkbox" value="1"> <label for="is-yearly-{{ $role->id }}">Yearly reminder</label> 
                                                    </div> 
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 control-label"> Note </label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" placeholder="Optional description..." name="title" type="text" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" >Edit</button>
                                            </div>
                                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>       
                        </div>
                        <div class="tab-pane fade" id="pills-calenders" role="tabpanel" aria-labelledby="pills-calenders-tab">
                            <div class="row gutter30">
                                <div class="col-md-12">
                                <p>
                                    Please define to which calendars the employees of this role should have access to. All employees always automatically have access to their own calendar with configured reminders and meetings.
                                </p>
                                <div class="alert alert-warning mb-4">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Calendar access rights apply for the global calendar only (and not for the absence section of single employees). Calendar access rights potentially overwrite the “View" right from the general access rights configuration.
                                </div>
                                </div>
                            </div>
                            <div class="row gutter30">           
                                <form class="form-horizontal w-100">                             
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            My calendar
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" data-calendar-id="employee" >
                                                <option value="own" selected="selected">Own</option></select>
                                            </div>

                                            <div data-calendar="calendar_acl[employee]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[employee]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Birthdays
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option></select>
                                            </div>
                                            <div data-calendar="calendar_acl[birthdays]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[birthdays]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Start/end dates
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" data-calendar-id="start_end" name="calendar_acl[start_end]"><option value="none" selected="selected">None</option><option value="global">Global</option><option value="reports">Own team</option><option value="department">Own department</option><option value="office">Own office</option><option value="subcompany">Own subcompany</option><option value="custom">Custom...</option></select>
                                            </div>
                                            <div data-calendar="calendar_acl[start_end]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[start_end]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Public holidays
                                        </label>
                                        <div class="col-md-4">

                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none">None</option>
                                                    <option value="office" selected="selected">Own office</option>
                                                </select>
                                            </div>
                                            <div class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input  type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Recruiting
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                </select>
                                            </div>
                                            <div  class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[recruiting]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Absences
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="global" selected="selected">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option>
                                                </select>
                                            </div>
                                            <div  class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input type="hidden" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Paid vacation
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option>
                                                </select>
                                            </div>
                                            <div  class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157352]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Sick days
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option>
                                                </select>
                                            </div>
                                            <div class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157353]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Parental leave
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option>
                                                </select>
                                            </div>
                                            <div class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157354]" type="hidden" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Maternity protection
                                        </label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <select class="form-control" >
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="global">Global</option>
                                                    <option value="reports">Own team</option>
                                                    <option value="department">Own department</option>
                                                    <option value="office">Own office</option>
                                                    <option value="subcompany">Own subcompany</option>
                                                    <option value="custom">Custom...</option>
                                                </select>
                                            </div>

                                            <div data-calendar="calendar_acl[time_off=157355]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157355]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Unpaid vacation
                                        </label>
                                        <div class="col-md-4">

                                            <div class="row">
                                                <select class="form-control" data-calendar-id="time_off=157357" name="calendar_acl[time_off=157357]"><option value="none" selected="selected">None</option><option value="global">Global</option><option value="reports">Own team</option><option value="department">Own department</option><option value="office">Own office</option><option value="subcompany">Own subcompany</option><option value="custom">Custom...</option></select>
                                            </div>

                                            <div data-calendar="calendar_acl[time_off=157357]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157357]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="calendar-acl form-group d-flex">
                                        <label class="control-label col-md-4">
                                            Home office
                                        </label>
                                        <div class="col-md-4">

                                            <div class="row">
                                                <select class="form-control" data-calendar-id="time_off=157356" name="calendar_acl[time_off=157356]"><option value="none">None</option><option value="global" selected="selected">Global</option><option value="reports">Own team</option><option value="department">Own department</option><option value="office">Own office</option><option value="subcompany">Own subcompany</option><option value="custom">Custom...</option></select>
                                            </div>

                                            <div data-calendar="calendar_acl[time_off=157356]" class="row edit-rules" >
                                                <a href="edit-rules">Edit custom rules</a>
                                                <input name="calendar_acl_custom[time_off=157356]" type="hidden" value="">
                                            </div>

                                        </div>
                                    </div>                        
                                    <div class="form-group d-flex">
                                    <div class="col-md-9 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-arrow-right"></i> Save changes</button>
                                    </div>
                                    </div>
                                </form>          
                            </div> 
                
                        </div>
                        <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab">
                                <form method="POST" action="" class="form-horizontal">
                                        <input type="hidden" value="">
                                        <input  type="hidden" value="">
                                        <div class="form-group row">
                                            <label class="col-md-4 control-label">
                                                Force 2 factor authentication
                                            </label>
                                            <div class="col-md-7 form-control-static">
                                                <input  type="hidden" value="">
                                                <input  type="checkbox" value="1">
                                                <br>
                                                <p>This means that each employee in this role will have to enter an additional token generated by the <a href="" target="_blank">Google Authenticator</a> when logging in. This is <strong>not required</strong> for logins through their Google Account email.</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8 offset-4">
                                                <button type="reset" class="btn btn-default "><i class="fas fa-times"></i> Cancel</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                                            </div>
                                        </div>
                                    </form>
                        </div> 
                    </div>    
                
                </div>                                       
                @endforeach
            </div>
    </div>
@endsection
@section('admin-additional-js')
        <script src="{{ asset('admin/js/jquery.bootstrap-duallistbox.js') }}"></script>  
        <script type="text/javascript">
            $(document).ready(function(){
            //     $("select").change(function(){
            //         $(this).find("option:selected").each(function(){
            //             var optionValue = $(this).attr("value");
            //                 $(".boxs").hide();
            //                 $("#" + optionValue).show();
            //         });
            //     }).change();
            // });

            var room = 1;

            $('#copy').click(function() {
                room++;
                var objTo = document.getElementById('education_fields')
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "form-group removeclass" + room);
                var rdiv = 'removeclass' + room;
                divtest.innerHTML = '  <div class="row"><div class="input-group col-md-5"> <select class="form-control select-chosen " ><option value="id">ID</option><option value="first_name">First name</option> <option value="last_name">Last name</option> <option value="email">Email</option> <option value="position">Position</option> <option value="gender">Gender</option> <option value="status">Status</option> <option value="employment_type">Employment type</option> <option value="termination_type">Termination type</option> <option value="termination_reason">Termination reason</option> <option value="termination_date">Termination date</option> <option value="termination_at">Notice pronounced</option></select> </div><div class="input-group-append col-md-5" id="special"></div><div class="clear"><button class="btn " type="button" onclick="remove_education_fields(' + room + ');"> <i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button></div></div>';
                objTo.appendChild(divtest)           
            });

            function remove_education_fields(rid) {
                $('.removeclass' + rid).remove();
            }

            $(".education_fields").select2({
                placeholder: "Select a state",
                allowClear: true
            });

            $(document).ready(function(){ 
                $(".show").click(function(){
                    $("#reminder").show();
                });

                $(".d-hide").click(function(){
                    $("#reminder").hide();
                });


                $(".add-filter-type").change(function(){
                    var type = $(this).val();
                    var id = $(this).data('id');
                    $("#special_" + id).hide();
                    if(type == 1){
                        $("#special_" + id).show();
                    } else {
                        $("#special_" + id).hide();
                    }
                });

                $('.add-filter').click(function() {
                    let unique = makeRandom(16);
                    let role = $(this).data('role');
                    let html = `<div class="form-group row" id="delete-`+role+`-filter-`+unique+`">
                                    <div class="input-group col-md-5">
                                        <select class="form-control select-filter" name="filter_attr[]" data-role="`+role+`" id="select-`+role+`-attr-`+unique+`" data-unique="`+unique+`">
                                            @foreach($attributes as $attribute)
                                            <option id="attr-{{$attribute->id}}" data-attr="{{ $attribute->name }}" value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group-append col-md-5" id="input-`+role+`-filter-`+unique+`">
                                    </div>
                                    <div class="clear col-md-1">
                                        <button class="btn" type="button" data-role="`+role+`" onclick="deleteFilter(`+role+`,'` + unique + `');"><i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button>
                                    </div>
                                </div>`;
                    $('#addFilterContainer-'+role).append(html);

                    // $("select.select-filter").select2({
                    //     placeholder: "What type of attribute is this?",
                    //     allowClear: true,
                    // });
                });

                $(document).on('change', 'select.select-filter', function () {
                    let role = $(this).data('role'); 
                    let unique = $(this).data('unique');
                    let attr_id = $('#select-'+role+'-attr-'+unique).val();
                    let attr = $('#attr-'+attr_id).data('attr');
                    let html = `<input class="form-control" placeholder="`+attr+`" required="" name="filter_value[`+attr_id+`]" type="text" value="" required>`;
                    $('#input-'+role+'-filter-'+unique).html(html);
                });

            });

            $(".edit-filter-type").change(function(){
                var role = $(this).data('role');
                var reminder = $(this).data('reminder');
                var type = $(this).val();
                $('#edit-'+role+'-special-'+reminder).hide();
                if(type == 1){
                    $('#edit-'+role+'-special-'+reminder).show();
                } else {
                    $('#edit-'+role+'-special-'+reminder).hide();
                }
            });

            $('.another-add-filter').click(function() {
                let role = $(this).data('role');
                let reminder = $(this).data('reminder');
                let unique = makeRandom(16);
                let html = `<div class="form-group row" id="delete-`+role+`-filter-`+unique+`">
                                <div class="input-group col-md-5">
                                    <select class="form-control edit-select-filter" name="filter_attr[]" data-role="`+role+`" id="select-`+role+`-attr-`+unique+`" data-unique="`+unique+`" data-reminder="`+reminder+`">
                                        @foreach($attributes as $attribute)
                                        <option id="attr-{{$attribute->id}}" data-attr="{{ $attribute->name }}" value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group-append col-md-5" id="edit-input-`+role+`-filter-`+unique+`">
                                </div>
                                <div class="clear col-md-1">
                                    <button class="btn" type="button" data-role="`+role+`" onclick="deleteFilter(`+role+`,'`+unique+`');"><i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button>
                                </div>
                            </div>`;
                $('#another-'+role+'-container-'+reminder).append(html);
                // $(document.).select2();
                // $(document).ready(function() {
                    // $('.edit-select-filter').select2();
                // });
            });

            $(document).on('change', 'select.edit-select-filter', function () {
                let role = $(this).data('role'); 
                let reminder = $(this).data('reminder');
                let unique = $(this).data('unique');
                let attr_id = $('#select-'+role+'-attr-'+unique).val();
                let attr = $('#attr-'+attr_id).data('attr');
                console.log('edit-input-'+role+'-filter-'+unique);
                let html = `<input class="form-control" placeholder="`+attr+`" required="" name="filter_value[`+attr_id+`]" type="text" value="" required>`;
                $('#edit-input-'+role+'-filter-'+unique).html(html);
            });


     
            var demo1 = $('select[name="users[]"]').bootstrapDualListbox();

            var demo2 = $('.demo2').bootstrapDualListbox({
                nonSelectedListLabel: 'Non-selected',
                selectedListLabel: 'Selected',
                preserveSelectionOnMove: 'moved',
                moveOnSelect: false,
                nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
            });
            // Material Select Initialization   


            $('.remindSelect').select2();
        });

        function deleteFilter(role,unique) {
            $('#delete-'+role+'-filter-'+unique).remove();
        }

        function makeRandom(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
        </script>
    </body>
</html>
@endsection
