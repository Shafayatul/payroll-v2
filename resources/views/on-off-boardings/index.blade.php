@extends('layouts.admin.master')
@section('title', 'On Off Boardings')
@section('admin-additional-css')
<link href="{{ asset('admin/css/departments.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/onboarding.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="shadowed-box">
    <div class="full">
        <ul id="office_list" class="nav nav-tabs tabs-vertical ul-tab" data-toggle="tabs" ole="tablist">
            <li class="active nav-item">
                <a class="nav-link" data-toggle="tab" href="#Onboarding">Onboarding Templates</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Onboarding-Steps" role="tab">Onboarding Steps</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Offboarding" role="tab">Offboarding Templates</a> 
            </li>             
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Offboarding-step" role="tab">Offboarding Steps</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#teams" role="tab">Teams</a> 
            </li> 
        </ul>
        <div class="tab-content">
            <div id="Onboarding" class="tab-pane active">                          
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Templates</h4>
                            <form method="POST" action="" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New office..." required="" minlength="2" name="_name" type="text"> 
                                    <span class="input-group-btn"> 
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                    </span> 
                                </div>
                            </form>
                            <br>
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist"> 
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
                                        Full-time employees basic
                                    </a>
                                </li>                                  
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        <div class="block-section tab-pane active" id="tab1" role="tabpanel">
                            <h4 class="sub-header">Full-time employees basic</h4>
                            <div class="pull-right">
                                <a  data-toggle="modal" data-target="#edit-tem">
                                    <i class="fas fa-pencil-alt" data-toggle="tooltip" title="" data-original-title="Edit template name"></i>
                                </a>
                                <a class="duplicate-template" href="javascript:void(0)" data-template-id="117252">
                                    <i class="far fa-copy" data-toggle="tooltip" title="" data-original-title="Duplicate template"></i>
                                </a>    
                                <a data-toggle="modal" data-target="#exampleModal"> 
                                    <i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> 
                                </a>                                        
                            </div>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                            <div class="modal fade" id="edit-tem" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
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
                                                    <input class="form-control " required="" placeholder="Full-time employees basic" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn  btn-info">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal form-striped compact" id="office-div1">
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
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Set up workspace
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control valid">
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="">IT Team</option>
                                                   </optgroup>
                                               </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="7">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control valid">
                                                            <option value="-1" selected="selected">before hire</option>
                                                            <option value="1">after hire</option>
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
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Set up accounts
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control">
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="" selected="selected">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="7">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control">
                                                            <option value="-1" selected="selected">before hire</option>
                                                            <option value="1">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404796">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Create a personnel file
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control" >
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="" selected="selected">HR Team</option>
                                                        <option value="">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control" type="text" value="5">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" >
                                                            <option value="-1">before hire</option>
                                                            <option value="1" selected="selected">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404792">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Invite new employee to Personio
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control" >
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="" selected="selected">HR Team</option>
                                                        <option value="{&quot;team&quot;:58998}">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="0">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control">
                                                            <option value="-1">before hire</option>
                                                            <option value="1" selected="selected">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404793">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Welcome Email
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control" >
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant">Employee</option>
                                                     <optgroup label="On-/Offboarding Team">
                                                        <option value="" selected="selected">HR Team</option>
                                                        <option value="">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="0">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" >
                                                            <option value="-1">before hire</option>
                                                            <option value="1" selected="selected">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group d-flex">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404794">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group d-flex">
                                                <p class="form-control-static">
                                                    Complete your profile
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control" >
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant" selected="selected">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="5">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" >
                                                            <option value="-1">before hire</option>
                                                            <option value="1" selected="selected">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404806">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="form-control-static">
                                                    <i class="fas fa-sort handle ui-sortable-handle" data-toggle="tooltip" data-title="Drag to sort." data-original-title="" title=""></i>
                                                </p>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    Submit documents
                                                </p>
                                            </td>
                                            <td>
                                                <select class="form-control">
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="applicant" selected="selected">Employee</option>
                                                    <optgroup label="On-/Offboarding Team">
                                                        <option value="">HR Team</option>
                                                        <option value="">IT Team</option>
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group d-flex">
                                                    <div class="col-md-4">
                                                        <input class="form-control"  type="text" value="3">
                                                    </div>
                                                    <div class="col-md-2 form-control-static">
                                                        days
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control">
                                                            <option value="-1">before hire</option>
                                                            <option value="1" selected="selected">after hire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="form-group">
                                                <p class="form-control-static">
                                                    <a href="#modal-remove-step" data-toggle="modal" data-template-id="117252" data-step-id="404797">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-arrow-right"></i> 
                                    Save changes
                                </button>
                                <br><br>
                                <a href="#modal-add-step" data-toggle="modal" data-template-id="117252">
                                    <i class="fas fa-plus-circle"></i>
                                    Add step
                                </a>
                                <div id="modal-add-step" class="modal in" tabindex="-1" role="dialog" aria-hidden="false" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                                
                                            <div class="modal-header">               
                                                <h4 class="modal-title">Add step to template</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="" accept-charset="UTF-8" novalidate="novalidate"><input name="_token" type="hidden" value="">
                                            <input name="template_id" type="hidden" value="117252">
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Step
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control select-chosen" style="width:100%;">
                                                                <option value="404792">Create a personnel file</option>
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
                                                                <optgroup label="On-/Offboarding Team">
                                                                    <option value="">HR Team</option>
                                                                    <option value="">IT Team</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group d-flex">
                                                        <label class="col-md-4 control-label">
                                                            Deadline
                                                        </label>
                                                        <div class="col-md-1">
                                                            <input class="form-control" number="number" name="due_date_offset" type="text">
                                                        </div>
                                                        <div class="col-md-1 form-control-static">
                                                            days
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="offset_direction">
                                                                <option value="-1">before hire</option>
                                                                <option value="1">after hire</option>
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
                            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal office1" id="office1" novalidate="novalidate">
                                <div class="form-group">
                                    <div class="col-md-9 offset-3">
                                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible1();">
                                            <i class="fas fa-times"></i> 
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-arrow-right"></i> 
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane  p-3" id="tab2" role="tabpanel">
                            <h4 class="sub-header">
                                Feedback meeting (probation period) 
                                <small> 
                                    <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible2();">
                                        (Edit)
                                    </a> 
                                </small> 
                                <a href="#modal-delete-office" data-toggle="modal"> 
                                    <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> 
                                </a>
                            </h4>
                            <div class="form-horizontal form-striped compact" id="office-div2"></div>
                            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office2" novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible2();">
                                            <i class="fas fa-times"></i> 
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-arrow-right"></i> 
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                        <div class="tab-pane  p-3" id="tab3" role="tabpanel"></div>
                    </div>   
                </div>
            </div>  
            <div id="Onboarding-Steps" class="tab-pane fade">
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Steps</h4>
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="New step..." required="" minlength="2" name="step_name" type="text">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        Type 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu select-step-type">
                                        <li> 
                                            <a href="javascript:void(0)" data-step-type="general"> 
                                                <i class="fas fa-check"></i>
                                                General step 
                                            </a> 
                                        </li>
                                        <li> 
                                            <a href="javascript:void(0)" data-step-type="email"> 
                                                Email action 
                                            </a> 
                                        </li>
                                    </ul>
                                </div>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </span>
                            </div>                                   
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist"> 
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
                                        Full-time employees basic
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
                                        Full-time employees extended
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">
                                        Interns</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">
                                        Working students
                                    </a>
                                </li>                                    
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        <div class="block-section tab-pane active" id="tab1" role="tabpanel">
                            g3ik-gi3-=ig-2gg-2g= ow3=-9hg
                        </div>
                    </div>
                </div>
            </div>
            <div id="Offboarding" class="tab-pane fade"></div>
            <div id="Offboarding-step" class="tab-pane fade"></div>
            <div id="teams" class="tab-pane fade"></div>
        </div>
    </div>
</div>
@endsection      
@section('admin-additional-js')
<script type="text/javascript">
    function switchVisible() {
        if (document.getElementById('office-div')) {

            if (document.getElementById('office-div').style.display == 'none') {
                document.getElementById('office-div').style.display = 'block';
                document.getElementById('office').style.display = 'none';
            }
            else {
                document.getElementById('office-div').style.display = 'none';
                document.getElementById('office').style.display = 'block';
            }
        }
    }
    function switchVisible1() {
        if (document.getElementById('office-div1')) {

            if (document.getElementById('office-div1').style.display == 'none') {
                document.getElementById('office-div1').style.display = 'block';
                document.getElementById('office1').style.display = 'none';
            }
            else {
                document.getElementById('office-div1').style.display = 'none';
                document.getElementById('office1').style.display = 'block';
            }
        }
    }
    function switchVisible2() {
        if (document.getElementById('office-div2')) {

            if (document.getElementById('office-div2').style.display == 'none') {
                document.getElementById('office-div2').style.display = 'block';
                document.getElementById('office2').style.display = 'none';
            }
            else {
                document.getElementById('office-div2').style.display = 'none';
                document.getElementById('office2').style.display = 'block';
            }
        }
    }
    function switchVisible3() {
        if (document.getElementById('office-div3')) {

            if (document.getElementById('office-div3').style.display == 'none') {
                document.getElementById('office-div3').style.display = 'block';
                document.getElementById('office3').style.display = 'none';
            }
            else {
                document.getElementById('office-div3').style.display = 'none';
                document.getElementById('office3').style.display = 'block';
            }
        }
    }

    $(document).ready(function() {
        $('.select-chosen').select2();
    });
</script>
@endsection