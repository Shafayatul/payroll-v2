@extends('layouts.admin.master')
@section('title', 'On Off Boardings')
@section('admin-additional-css')
<link href="{{ asset('admin/css/departments.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/onboarding.css') }}"  rel="stylesheet" media="all">
<link href="{{ asset('admin/css/employee-role.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="shadowed-box">
    <div class="full">
        <ul id="office_list" class="nav nav-tabs tabs-vertical ul-tab" data-toggle="tabs" ole="tablist">
            <li class="active nav-item">
                <a class="nav-link" data-toggle="tab" href="#Onboarding" onclick="tabPan('Onboarding');" role="tab">Onboarding Templates</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Onboarding-Steps" onclick="tabPan('Onboarding-Steps');" role="tab">Onboarding Steps</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Offboarding" onclick="tabPan('Offboarding');" role="tab">Offboarding Templates</a> 
            </li>             
           <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Offboarding-step" onclick="tabPan('Offboarding-step');" role="tab">Offboarding Steps</a> 
            </li>
             <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#teams" onclick="tabPan('teams');" role="tab">Teams</a> 
            </li> 
        </ul>
        <div class="tab-content">
            <div id="Onboarding" class="active">                       
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Templates</h4>
                            <form method="POST" action="{{ route('boarding-template.store') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New Template Name..." required="" minlength="2" name="name" type="text">
                                    <input type="hidden" name="type" value="1"> 
                                    <span class="input-group-btn"> 
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                    </span> 
                                </div>
                            </form>
                            <br>
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                                @foreach($on_boarding_templates as $template) 
                                <li class="nav-item">
                                    <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : ''}}" data-toggle="tab" onclick="openTab({{ $template->id }})" role="tab">
                                        {{ $template->name }}
                                    </a>
                                </li> 
                                @endforeach                                 
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($on_boarding_templates as $template)
                        <div class="block-section tab-pane {{ ($loop->iteration == 1) ? "active" : '' }}"  id="tab{{ $template->id }}" role="tabpanel">
                            <h4 class="sub-header">{{ $template->name }}</h4>
                            <div class="pull-right">
                                <a data-toggle="modal" data-target="#edit-template-{{ $template->id }}">
                                    <i class="fas fa-pencil-alt" data-toggle="tooltip" title="" data-original-title="Edit template name"></i>
                                </a>
                                <a class="duplicate-template" href="javascript:void(0)" data-template-id="117252">
                                    <i class="fas fa-copy" data-toggle="tooltip" title="" data-original-title="Duplicate template"></i>
                                </a>    
                                <a data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a> 
                                                                    
                           </div>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">
                                                Delete this template
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-3">Are you sure that you want to delete this template?</p>
                                            <p class="mb-3">
                                                Existing assignments of this template remain so outstanding onboarding processes based on this template can be completed.
                                                <span class="assigned-info">
                                                    This template has been assigned to the following employees:
                                                </span>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!----Edit Modal----->
                            <div class="modal fade" id="edit-template-{{ $template->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('template-update') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="edit-temLabel">
                                                    Edit template name
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group d-flex">
                                                    <label class="col-md-3 control-label">Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control " required="" name="name" placeholder="Full-time employees basic" type="text" value="{{ $template->name }}">
                                                        <input type="hidden" name="template_id" value="{{ $template->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn  btn-info">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!----Edit Modal----->
                            <!----Edit Modal----->
                            <div class="form-horizontal form-striped compact department-details" id="department-div-{{ $template->id }}">
                            <form action="{{ route('boarding-template-step.update') }}" method="POST">
                            @csrf 
                                <table class="table ">
                                    <thead>
                                        <tr class="small">
                                            <th with="5%"></th>
                                            <th width="30%">
                                                Step
                                            </th>
                                            <th class="text-center" width="25%">
                                                Responsible
                                            </th>
                                            <th colspan="3" class="text-center" width="38%">
                                                Deadline
                                            </th>
                                            <th width="2%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="ui-sortable">
                                        
                                        @foreach($template->boardingTemplateStep as $step)
                                        <input type="hidden" name="boarding_template_id" value="{{ $template->id }}">
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    {{ $step->name }}
                                                </p>
                                                <input type="hidden" name="boarding_step_id[]" value="{{ $step->pivot->boarding_step_id }}">
                                            </td>
                                            <td>
                                                <select class="form-control valid" name="responsible[]">
                                                    <option>Please Select</option>
                                                    <option value="supervisor" {{ ($step->pivot->responsible == 'supervisor') ? 'selected' : '' }}>Supervisor</option>
                                                    <option value="applicant" {{ ($step->pivot->responsible == 'applicant') ? 'selected' : '' }}>Employee</option>
                                                    {{-- <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="">IT Team</option>
                                                   </optgroup> --}}
                                               </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control" name="days[]"  type="text" value="{{ $step->pivot->days }}">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control valid" name="hire_type[]">
                                                            <option>Please Select</option>
                                                            @foreach($highringType as $key => $value)
                                                                <option value="{{ $key }}" {{ ($step->pivot->hire_type == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404795">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-arrow-right"></i> 
                                    Save changes
                                </button>
                            </form>
                                <br><br>
                                <a href="#modal-add-step{{ $template->id }}" data-toggle="modal">
                                    <i class="fas fa-plus-circle"></i>
                                    Add step
                                </a>
                                <div id="modal-add-step{{ $template->id }}" class="modal in" tabindex="-1" role="dialog" aria-hidden="false" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                                
                                            <div class="modal-header">               
                                                <h4 class="modal-title">Add step to template</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('boarding-template-step.store') }}" accept-charset="UTF-8" novalidate="novalidate"><input name="_token" type="hidden" value="">
                                            @csrf
                                            <input name="boarding_template_id" type="hidden" value="{{ $template->id }}">
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Step
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="boarding_step_id" style="width:100%;">
                                                                @foreach($on_boarding_steps as $key => $value)
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>      
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Responsible
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control valid" name="responsible">
                                                                <option value="supervisor">Supervisor</option>
                                                                <option value="applicant">Employee</option>
                                                                
                                                                {{-- <optgroup label="On-/Offboarding Team">
                                                                    <option value="">HR Team</option>
                                                                    <option value="">IT Team</option>
                                                                </optgroup> --}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Deadline
                                                        </label>
                                                        <div class="col-md-1">
                                                            <input class="form-control" number="number" name="days" type="text">
                                                        </div>
                                                        <div class="col-md-1 form-control-static">
                                                            days
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="hire_type">
                                                                @foreach($highringType as $key => $type)
                                                                <option value="{{ $key }}">{{ $type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    </div>   
                </div>
            </div>  
            <div id="Onboarding-Steps" class="fade">
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Steps</h4>
                            <form method="POST" action="{{ route('boarding-step.store') }}" accept-charset="UTF-8" id="step_form" novalidate="novalidate">
                            @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New step..." required="" minlength="2" name="name" type="text">
                                    <div class="input-group-btn">
                                        <select class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown" name="type">
                                            <option>Select Type</option>
                                            @foreach($boardingStepType as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="boarding_type" value="1">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>                                   
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                                @foreach($on_boarding_steps as $boarding_step)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : '' }}" data-toggle="tab" onclick="stepPan({{ $boarding_step->id }});" role="tab">
                                        {{ $boarding_step->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($on_boarding_steps as $boarding_step)
                        <div class="block-section step-tab-pane" {{ ($loop->iteration == 1) ? 'class=active' : "style=display:none!important;" }} id="step-tab{{ $boarding_step->id }}" role="tabpanel">
                        <h4 class="sub-header">
                            {{ $boarding_step->name }}
                            <small>
                                <a class="edit-toggle" data-toggle="modal" title="" data-target="#edit-step-{{ $boarding_step->id }}">(Edit)</a>
                            </small>
                            <a href="#modal-delete-step" data-toggle="modal">
                                <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this step"></i>
                            </a>
                         </h4>

                        <div class="modal fade" id="edit-step-{{ $boarding_step->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('step-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="edit-temLabel">
                                                Edit Boarding Step Name
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control " required="" name="name" placeholder="Full-time employees basic" type="text" value="{{ $boarding_step->name }}">
                                                    <input type="hidden" name="step_id" value="{{ $boarding_step->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn  btn-info">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="form-horizontal">
                            <form method="POST" action="{{ route('boarding-step-item.update') }}" accept-charset="UTF-8" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="boarding_step_id" value="{{ $boarding_step->id }}">
                                <table class="table table-striped general-steps position-relative">
                                    <thead>
                                        <tr class="small">
                                            <th width="2%"></th>
                                            <th width="45%">Items</th>
                                            <th width="33%"></th>
                                            <th width="18%"></th>
                                            <th width="2%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="draggable-tbody ui-sortable" style="">
                                        @foreach($boarding_step->stepItems as $key => $item)

                                        <tr style="">
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <i class="fas fa-align-left handle ui-sortable-handle" data-toggle="tooltip" data-title="Text information. Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            @if($item->type_key == 0)
                                                <td colspan="3">
                                                    <textarea style="width: 100%" class="resize-vertical-only valid" placeholder="Enter your text here..." name="value[{{ $item->id }}]" cols="50" rows="10">{{ $item->value }}</textarea>
                                                </td>
                                            @elseif($item->type_key == 1)
                                                <td colspan="3">
                                                    <input class="form-control" placeholder="Name of the document..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                    {{-- <input name="document_file[]" type="file"> --}}
                                                </td>
                                            @elseif($item->type_key == 2)
                                                <td colspan="2" class="form-group">
                                                    <select class="form-control required" name="value[{{ $item->id }}]">
                                                        <option>Please select...</option>
                                                        <option value="id" {{ ($item->value == 'id') ? 'selected' : '' }}>ID</option>
                                                        <option value="first_name" {{ ($item->value == 'first_name') ? 'selected' : '' }}>First name</option>
                                                        <option value="last_name" {{ ($item->value == 'last_name') ? 'selected' : '' }}>Last name</option>
                                                        <option value="email" {{ ($item->value == 'email') ? 'selected' : '' }}>Email</option>
                                                        <option value="position" {{ ($item->value == 'position') ? 'selected' : '' }}>Position</option>
                                                        <option value="gender" {{ ($item->value == 'gender') ? 'selected' : '' }}>Gender</option>
                                                    </select>
                                                </td>
                                                <td class="form-group" style="padding: 7px">    
                                                    <div class="required">
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </div>
                                                </td>
                                            @elseif($item->type_key == 3)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Profile Picture label..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">            
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 4)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Description for the checkbox..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 5)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Name of textfield" name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 6)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Name of URL" name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @else
                                                <td>
                                                    <input style="width: 100%" class="resize-vertical-only valid" placeholder="Enter your text here..." name="value[]" cols="50" rows="10" value="{{ $item->value }}">
                                                </td>
                                                {{-- <td>
                                                    <select class="" name="document_category[]">
                                                        <option>Select Category</option>
                                                        @foreach($documentCategories as $key => $category)
                                                            <option value="{{ $key }}">{{ $category }}</option>
                                                        @endforeach
                                                    </select>
                                                </td> --}}
                                            @endif
                                            <td>
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-item" data-toggle="modal"><i class="fas fa-trash"></i></a>
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <button type="submit" class="btn btn-sm btn-primary">
                                   <i class="fas fa-arrow-right"></i> Save changes
                                </button>
                              <br>
                              <br>
                                <a href="" data-toggle="modal" data-target="#add-item">
                                  <i class="fas fa-plus-circle"></i>
                                    Add item
                                </a> 
                            </form>

                            <div id="add-item" class="modal in" tabindex="-1" role="dialog" aria-hidden="false" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                                
                                            <div class="modal-header">               
                                                <h4 class="modal-title">Add Item</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('boarding-step-item.store') }}" accept-charset="UTF-8" novalidate="novalidate">
                                            @csrf
                                            @method('POST')
                                            <input name="boarding_step_id" type="hidden" value="{{ $boarding_step->id }}">
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Step
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" style="width:100%;" name="type_key">
                                                                <option>Please Select</option>
                                                                @foreach($boardingStepItems as $key => $value)
                                                                <option value="{{ $key }}">
                                                                    {{ $value }}
                                                                </option>
                                                                @endforeach
                                                            </select>      
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div id="Offboarding" class="fade">
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Templates</h4>
                            <form method="POST" action="{{ route('boarding-template.store') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New Template Name..." required="" minlength="2" name="name" type="text">
                                    <input type="hidden" name="type" value="0"> 
                                    <span class="input-group-btn"> 
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                    </span> 
                                </div>
                            </form>
                            <br>
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                                @foreach($off_boarding_templates as $template) 
                                <li class="nav-item">
                                    <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : ''}}" data-toggle="tab" onclick="openTab({{ $template->id }})" role="tab">
                                        {{ $template->name }}
                                    </a>
                                </li> 
                                @endforeach                                 
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($off_boarding_templates as $template)
                        <div class="block-section tab-pane {{ ($loop->iteration == 1) ? "active" : '' }}"  id="tab{{ $template->id }}" role="tabpanel">
                            <h4 class="sub-header">{{ $template->name }}</h4>
                            <div class="pull-right">
                                <a data-toggle="modal" data-target="#edit-template-{{ $template->id }}">
                                    <i class="fas fa-pencil-alt" data-toggle="tooltip" title="" data-original-title="Edit template name"></i>
                                </a>
                                <a class="duplicate-template" href="javascript:void(0)" data-template-id="117252">
                                    <i class="fas fa-copy" data-toggle="tooltip" title="" data-original-title="Duplicate template"></i>
                                </a>    
                                <a data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a> 
                                                                    
                           </div>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">
                                                Delete this template
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-3">Are you sure that you want to delete this template?</p>
                                            <p class="mb-3">
                                                Existing assignments of this template remain so outstanding onboarding processes based on this template can be completed.
                                                <span class="assigned-info">
                                                    This template has been assigned to the following employees:
                                                </span>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!----Edit Modal----->
                            <div class="modal fade" id="edit-template-{{ $template->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('template-update') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="edit-temLabel">
                                                    Edit template name
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group d-flex">
                                                    <label class="col-md-3 control-label">Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control " required="" name="name" placeholder="Full-time employees basic" type="text" value="{{ $template->name }}">
                                                        <input type="hidden" name="template_id" value="{{ $template->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn  btn-info">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!----Edit Modal----->
                            <!----Edit Modal----->
                            <div class="form-horizontal form-striped compact department-details" id="department-div-{{ $template->id }}">
                            <form action="{{ route('boarding-template-step.update') }}" method="POST">
                            @csrf 
                                <table class="table ">
                                    <thead>
                                        <tr class="small">
                                            <th with="5%"></th>
                                            <th width="30%">
                                                Step
                                            </th>
                                            <th class="text-center" width="25%">
                                                Responsible
                                            </th>
                                            <th colspan="3" class="text-center" width="38%">
                                                Deadline
                                            </th>
                                            <th width="2%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="ui-sortable">
                                        
                                        @foreach($template->boardingTemplateStep as $step)
                                        <input type="hidden" name="boarding_template_id" value="{{ $template->id }}">
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    {{ $step->name }}
                                                </p>
                                                <input type="hidden" name="boarding_step_id[]" value="{{ $step->pivot->boarding_step_id }}">
                                            </td>
                                            <td>
                                                <select class="form-control valid" name="responsible[]">
                                                    <option>Please Select</option>
                                                    <option value="supervisor" {{ ($step->pivot->responsible == 'supervisor') ? 'selected' : '' }}>Supervisor</option>
                                                    <option value="applicant" {{ ($step->pivot->responsible == 'applicant') ? 'selected' : '' }}>Employee</option>
                                                    {{-- <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="">IT Team</option>
                                                   </optgroup> --}}
                                               </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control" name="days[]"  type="text" value="{{ $step->pivot->days }}">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control valid" name="hire_type[]">
                                                            <option>Please Select</option>
                                                            @foreach($highringType as $key => $value)
                                                                <option value="{{ $key }}" {{ ($step->pivot->hire_type == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404795">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-arrow-right"></i> 
                                    Save changes
                                </button>
                            </form>
                                <br><br>
                                <a href="#modal-add-step{{ $template->id }}" data-toggle="modal">
                                    <i class="fas fa-plus-circle"></i>
                                    Add step
                                </a>
                                <div id="modal-add-step{{ $template->id }}" class="modal in" tabindex="-1" role="dialog" aria-hidden="false" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                                
                                            <div class="modal-header">               
                                                <h4 class="modal-title">Add step to template</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('boarding-template-step.store') }}" accept-charset="UTF-8" novalidate="novalidate"><input name="_token" type="hidden" value="">
                                            @csrf
                                            <input name="boarding_template_id" type="hidden" value="{{ $template->id }}">
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Step
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="boarding_step_id" style="width:100%;">
                                                                @foreach($off_boarding_steps as $key => $value)
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>      
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Responsible
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control valid" name="responsible">
                                                                <option value="supervisor">Supervisor</option>
                                                                <option value="applicant">Employee</option>
                                                                
                                                                {{-- <optgroup label="On-/Offboarding Team">
                                                                    <option value="">HR Team</option>
                                                                    <option value="">IT Team</option>
                                                                </optgroup> --}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Deadline
                                                        </label>
                                                        <div class="col-md-1">
                                                            <input class="form-control" number="number" name="days" type="text">
                                                        </div>
                                                        <div class="col-md-1 form-control-static">
                                                            days
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="hire_type">
                                                                @foreach($highringType as $key => $type)
                                                                <option value="{{ $key }}">{{ $type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    </div>   
                </div>
            </div>
            <div id="Offboarding-step" class="fade">
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Steps</h4>
                            <form method="POST" action="{{ route('boarding-step.store') }}" accept-charset="UTF-8" id="step_form" novalidate="novalidate">
                            @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New step..." required="" minlength="2" name="name" type="text">
                                    <div class="input-group-btn">
                                        <select class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown" name="type">
                                            <option>Select Type</option>
                                            @foreach($boardingStepType as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="boarding_type" value="0">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>                                   
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                                @foreach($off_boarding_steps as $boarding_step)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : '' }}" data-toggle="tab" onclick="stepPan({{ $boarding_step->id }});" role="tab">
                                        {{ $boarding_step->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($off_boarding_steps as $boarding_step)
                        <div class="block-section step-tab-pane" {{ ($loop->iteration == 1) ? 'class=active' : "style=display:none!important;" }} id="step-tab{{ $boarding_step->id }}" role="tabpanel">
                        <h4 class="sub-header">
                            {{ $boarding_step->name }}
                            <small>
                                <a class="edit-toggle" data-toggle="modal" title="" data-target="#edit-off-step-{{ $boarding_step->id }}">(Edit)</a>
                            </small>
                            <a href="#modal-delete-step" data-toggle="modal">
                                <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this step"></i>
                            </a>
                         </h4>

                        <div class="modal fade" id="edit-off-step-{{ $boarding_step->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('step-update') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="edit-temLabel">
                                                Edit Boarding Step Name
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group d-flex">
                                                <label class="col-md-3 control-label">Name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control " required="" name="name" placeholder="Full-time employees basic" type="text" value="{{ $boarding_step->name }}">
                                                    <input type="hidden" name="step_id" value="{{ $boarding_step->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn  btn-info">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="form-horizontal">
                            <form method="POST" action="{{ route('boarding-step-item.update') }}" accept-charset="UTF-8" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="boarding_step_id" value="{{ $boarding_step->id }}">
                                <table class="table table-striped general-steps position-relative">
                                    <thead>
                                        <tr class="small">
                                            <th width="2%"></th>
                                            <th width="45%">Items</th>
                                            <th width="33%"></th>
                                            <th width="18%"></th>
                                            <th width="2%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="draggable-tbody ui-sortable" style="">
                                        @foreach($boarding_step->stepItems as $key => $item)

                                        <tr style="">
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <i class="fas fa-align-left handle ui-sortable-handle" data-toggle="tooltip" data-title="Text information. Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            @if($item->type_key == 0)
                                                <td colspan="3">
                                                    <textarea style="width: 100%" class="resize-vertical-only valid" placeholder="Enter your text here..." name="value[{{ $item->id }}]" cols="50" rows="10">{{ $item->value }}</textarea>
                                                </td>
                                            @elseif($item->type_key == 1)
                                                <td colspan="3">
                                                    <input class="form-control" placeholder="Name of the document..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                    {{-- <input name="document_file[]" type="file"> --}}
                                                </td>
                                            @elseif($item->type_key == 2)
                                                <td colspan="2" class="form-group">
                                                    <select class="form-control required" name="value[{{ $item->id }}]">
                                                        <option>Please select...</option>
                                                        <option value="id" {{ ($item->value == 'id') ? 'selected' : '' }}>ID</option>
                                                        <option value="first_name" {{ ($item->value == 'first_name') ? 'selected' : '' }}>First name</option>
                                                        <option value="last_name" {{ ($item->value == 'last_name') ? 'selected' : '' }}>Last name</option>
                                                        <option value="email" {{ ($item->value == 'email') ? 'selected' : '' }}>Email</option>
                                                        <option value="position" {{ ($item->value == 'position') ? 'selected' : '' }}>Position</option>
                                                        <option value="gender" {{ ($item->value == 'gender') ? 'selected' : '' }}>Gender</option>
                                                    </select>
                                                </td>
                                                <td class="form-group" style="padding: 7px">    
                                                    <div class="required">
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </div>
                                                </td>
                                            @elseif($item->type_key == 3)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Profile Picture label..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">            
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 4)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Description for the checkbox..." name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 5)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Name of textfield" name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @elseif($item->type_key == 6)
                                                <td colspan="2">
                                                    <input class="form-control" placeholder="Name of URL" name="value[{{ $item->id }}]" type="text" value="{{ $item->value }}">
                                                </td>
                                                <td class="form-group">
                                                    <p class="form-control-static">           
                                                        <input name="is_required[{{ $item->id }}]" type="checkbox" value="1" {{ ($item->is_required == 1) ? 'checked' : '' }}>
                                                        Required
                                                    </p>
                                                </td>
                                            @else
                                                <td>
                                                    <input style="width: 100%" class="resize-vertical-only valid" placeholder="Enter your text here..." name="value[]" cols="50" rows="10" value="{{ $item->value }}">
                                                </td>
                                                {{-- <td>
                                                    <select class="" name="document_category[]">
                                                        <option>Select Category</option>
                                                        @foreach($documentCategories as $key => $category)
                                                            <option value="{{ $key }}">{{ $category }}</option>
                                                        @endforeach
                                                    </select>
                                                </td> --}}
                                            @endif
                                            <td>
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-item" data-toggle="modal"><i class="fas fa-trash"></i></a>
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 <button type="submit" class="btn btn-sm btn-primary">
                                   <i class="fas fa-arrow-right"></i> Save changes
                                </button>
                              <br>
                              <br>
                                <a href="" data-toggle="modal" data-target="#add-off-step-item">
                                  <i class="fas fa-plus-circle"></i>
                                    Add item
                                </a> 
                            </form>

                            <div id="add-off-step-item" class="modal in" tabindex="-1" role="dialog" aria-hidden="false" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                                
                                            <div class="modal-header">               
                                                <h4 class="modal-title">Add Item</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('boarding-step-item.store') }}" accept-charset="UTF-8" novalidate="novalidate">
                                            @csrf
                                            @method('POST')
                                            <input name="boarding_step_id" type="hidden" value="{{ $boarding_step->id }}">
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Step
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" style="width:100%;" name="type_key">
                                                                <option>Please Select</option>
                                                                @foreach($boardingStepItems as $key => $value)
                                                                <option value="{{ $key }}">
                                                                    {{ $value }}
                                                                </option>
                                                                @endforeach
                                                            </select>      
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div id="teams" class="fade">
                <div class="shadowed-box">
                        <div class="row gutter30 ml-0">
                            <div class="col-md-4 ">
                                <div class="block-section customvtab vtabs row">
                                    <h4 class="sub-header">Groups</h4>
                                    <form method="POST" action="{{ route('groups.create') }}" accept-charset="UTF-8" novalidate="novalidate">
                                        @csrf
                                        <div class="input-group input-group-sm">
                                            <input class="form-control" placeholder="New Team Name..." required="" minlength="2" name="name" type="text">
                                            <span class="input-group-btn"> 
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i>
                                                </button> 
                                            </span> 
                                        </div>
                                    </form>
                                    <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" role="tablist">
                                        @foreach($groups as $group)
                                        <li class="nav-item">
                                            <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : '' }}" data-toggle="tab" onclick="openGroupTab({{ $group->id }});" role="tab">
                                                {{ $group->name }}
                                                {{-- <span class="badge pull-right">7</span> --}}
                                            </a> 
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 tab-content">
                                @foreach($groups as $group)
                                <div class="block-section tab-pane {{ ($loop->iteration == 1) ? 'active' : '' }}" id="group-tab{{ $group->id }}" role="tabpanel">
                                    <h4 class="sub-header">{{ $group->name }}
                                        <small>
                                            <a data-toggle="modal" data-target="#edit-group-{{ $group->id }}">
                                                (Edit)
                                            </a>  
                                        </small> 
                                        <a href="#modal-delete-office" data-toggle="modal"> 
                                            <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> 
                                        </a>
                                     </h4>

                                     <div class="modal fade" id="edit-group-{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('group-update') }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="edit-temLabel">
                                                            Boarding Group
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group d-flex">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control " required="" name="name" placeholder="Group name" type="text" value="{{ $group->name }}">
                                                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn  btn-info">
                                                            Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="pills-tab Content">
                                        <div class="tab-pane  active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <form id="demoform office1" action="{{ route('group-user.store') }}" method="post">
                                            @csrf
                                            <select multiple="multiple" size="10" name="user_id[]" title="user_id[]">
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}" {{ ($group->employees->contains($employee)) ? 'selected' : '' }}>
                                                        {{ $employee->name }}
                                                    </option>
                                                @endforeach                   
                                            </select>
                                            <input type="hidden" name="group_id" value="{{ $group->id }}">                                             
                                        
                                            <div class="submit-buttons-wrapper">
                                                <div class="col-md-12 pull-left">
                                                    <button type="button" class="btn btn-default edit-cancel"><i class="fas fa-times"></i> Cancel</button>
                                                    <button type="submit" class="btn btn-primary" id="btn-update-rights"><i class="fas fa-arrow-right"></i> Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        
                                        
                                     </div>    
                                 
                                </div>
                                @endforeach
                            </div>
                     </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection      
@section('admin-additional-js')
<script src="{{ asset('admin/js/jquery.bootstrap-duallistbox.js') }}"></script>  
<script type="text/javascript">

    function tabPan(id)
    {
        if(id == 'Onboarding'){
            $("#Onboarding").show();
            $("#Onboarding-Steps").hide();
            $("#Offboarding").hide();
            $("#Offboarding-step").hide();
            $("#teams").hide();
        }else if(id == 'Onboarding-Steps'){
            $("#Onboarding").hide();
            $("#Onboarding-Steps").show();
            $("#Offboarding").hide();
            $("#Offboarding-step").hide();
            $("#teams").hide();
        }else if(id == 'Offboarding'){
            $("#Onboarding").hide();
            $("#Onboarding-Steps").hide();
            $("#Offboarding").show();
            $("#Offboarding-step").hide();
            $("#teams").hide();
        }else if(id == 'Offboarding-step'){
            $("#Onboarding").hide();
            $("#Onboarding-Steps").hide();
            $("#Offboarding").hide();
            $("#Offboarding-step").show();
            $("#teams").hide()
        }else{
            $("#Onboarding").hide();
            $("#Onboarding-Steps").hide();
            $("#Offboarding").hide();
            $("#Offboarding-step").hide();
            $("#teams").show();
        }
    }

    function openTab(id){
        console.log(id);
        $('.tab-pane').hide();
        $('#tab'+id).show();
        $('#department-div-'+id).show();
    }
    function updateDepartment(id) {
        $('.department-details').hide();
        $('#department-'+id).show();
    }
    function cancelUpdate(id){
        $('#department-'+id).hide();
        $('#department-div'+id).show();
    }

    function stepPan(id){
        console.log(id);
        $('.step-tab-pane').hide();
        $('#step-tab'+id).show();
        $('#department-div-'+id).show();
    }

   
</script>
<script type="text/javascript">
     $(document).ready(function() {
        $('.select-chosen').select2();
    });
     var demo1 = $('select[name="user_id[]"]').bootstrapDualListbox();
          $("#demoform").submit(function() {
            alert($('[name="user_id[]"]').val());
            return false;
          });
          var demo2 = $('.demo2').bootstrapDualListbox({
              nonSelectedListLabel: 'Non-selected',
              selectedListLabel: 'Selected',
              preserveSelectionOnMove: 'moved',
              moveOnSelect: false,
              nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
            });
            // Material Select Initialization   



$(".select-chosen").select2({
    placeholder: "What type of attribute is this?",
    allowClear: true,
});
</script>
@endsection