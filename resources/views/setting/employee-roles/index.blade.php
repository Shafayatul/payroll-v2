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
           
                <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
                            Accounting
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
                            Customer Support
                            <span class="badge pull-right">7</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">
                            Finance & Lega
                            <span class="badge pull-right" >12</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">
                            HR
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab5" role="tab">
                            IT
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab6" role="tab">
                            Management
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab7" role="tab">
                            Marketing
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab8" role="tab">
                            Sales 
                            <span class="badge pull-right">7</span>
                        </a> 
                    </li>
                </ul>
            </div>
       </div>
        <div class="col-md-8 tab-content">
           <div class="block-section tab-pane active" id="tab1" role="tabpanel">
                <h4 class="sub-header">Accounting
                    <small> 
                        <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible1();">
                            (Edit)
                        </a> 
                    </small> 
                    <a href="#modal-delete-office" data-toggle="modal"> 
                        <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> 
                    </a>
                </h4>
                <ul class="nav nav-pills mb-3 roles" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            Members
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Access rights
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> 
                            Reminders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-calenders-tab" data-toggle="pill" href="#pills-calenders" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Calendars
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-security-tab" data-toggle="pill" href="#pills-security" role="tab" aria-controls="pills-security-tab" aria-selected="false">
                            Security
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tab Content">
                    <div class="tab-pane  active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form id="demoform office1" action="#" method="post">
                            <select multiple="multiple" size="10" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
                                <option value="option1">Accounting</option>
                                <option value="option2">Management</option>
                                <option value="option3" selected="selected">Administrator</option>
                                <option value="option4">Office Management</option>
                                <option value="option5">Recruiting Manager</option>
                                <option value="option6" selected="selected">Working Student</option>
                                <option value="option7" selected="selected">Administrator</option>
                                <option value="option8">Office Management</option>
                                <option value="option9">Recruiting Manager</option>
                                <option value="option10" selected="selected">Working Student</option>
                                <option value="option11" selected="selected">Administrator</option>
                                <option value="option12">Office Management</option>
                                <option value="option13">Recruiting Manager</option>
                                <option value="option14" selected="selected">Working Student</option>                         
                            </select>                                             
                        </form>
                        <div class="submit-buttons-wrapper">
                            <div class="col-md-12 pull-left">
                                <button type="button" class="btn btn-default edit-cancel">
                                    <i class="fas fa-times"></i> 
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" id="btn-update-rights">
                                    <i class="fas fa-arrow-right"></i> 
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table">
                            <thead class="collapse-trigger" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                <tr style="background: #eee;">
                                    <th> 
                                        <i class="fas fa-caret-down"></i> &nbsp;
                                        <b>Manage accounts</b> 
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-title="Access rights for the section 'Actions > Manage Account' in the employee profile" data-original-title="" title=""></i> 
                                    </th>
                                    <th  width="20%"> 
                                        View 
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-title="Role members can reset their own password and see the account status (e.g. last login) of other users, if the view right is granted for 'Team' or 'All'." data-original-title="" title=""></i> 
                                    </th>
                                    <th  width="20%"> Propose </th>
                                    <th  width="20%"> 
                                        Edit 
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-title="Role members can invite employees to Personio and send emails for password reset. Only administrators can change users' passwords." data-original-title="" title=""></i> 
                                    </th> 
                                </tr>
                            </thead>
                            <tbody class="collapse" id="collapseExample2">
                                <tr class="right-group">                                     
                                    <td class="view-right">                                           
                                        <div class="custom">
                                            <input  type="checkbox" value="own">
                                            <span class="checkbox-label">Own</span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="team"> <span class="checkbox-label">Team</span>
                                        </div>
                                       <br>
                                        <div class="custom">
                                            <input  type="checkbox">
                                            <span class="checkbox-label">
                                                <a href="#modal-custom-permissions"> Custom </a>
                                            </span>
                                         </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="all">
                                            <span class="checkbox-label">All</span>
                                        </div>
                                        <br>
                                    </td>
                                    <td class="propose-right right-9">
                                         
                                        <div class="custom">
                                            <input  type="checkbox" value="own">
                                            <span class="checkbox-label">Own</span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="team">
                                            <span class="checkbox-label">Team</span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox">
                                            <span class="checkbox-label">
                                                <a href="#modal-custom-permissions" data-toggle="modal" data-right-name="rights[9][edit_right][]" data-role-id="172511"> Custom </a>
                                            </span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="all">
                                            <span class="checkbox-label">All</span>
                                        </div>
                                        <br>                            
                                    </td>
                                    <td class="edit-right">                                           
                                        <div class="custom">
                                            <input  type="checkbox" value="own">
                                            <span class="checkbox-label">Own</span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="team">
                                            <span class="checkbox-label">Team</span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox">
                                            <span class="checkbox-label">
                                                <a href="#modal-custom-permissions" data-toggle="modal" data-right-name="rights[9][edit_right][]" data-role-id="172511"> Custom </a>
                                            </span>
                                        </div>
                                        <br>
                                        <div class="custom">
                                            <input  type="checkbox" value="all">
                                            <span class="checkbox-label">All</span>
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p>
                            The following reminders will be added automatically for every employee with this role.
                        </p>                            
                        <div class="reminder box">
                            Remind 
                            <span> 
                                employees of Accounting role 
                            </span>
                            <br> about 
                            <span class="highlight">
                                Last salary change
                            </span>
                            <br> of 
                            <span>
                                all employees 
                                <small>*</small>
                            </span>
                            <span> on that day</span>
                            <a href="#modal-edit-reminder"  data-toggle="modal">
                              <i class="fas fa-pencil-alt" data-toggle="tooltip" data-title="Edit reminder" data-original-title="" title=""></i>
                            </a>
                            <a href="#modal-delete-reminder" data-toggle="modal" data-reminder-id="342178" class="text-danger">
                                <i class="fas fa-times-circle" data-toggle="tooltip" data-title="Delete reminder" data-original-title="" title=""></i>
                            </a>
                            <div class="pt-3"> 
                                <strong>Expiration date:</strong> one day after <i>Last salary change</i> 
                            </div>
                        </div>                           
                        <a href="#modal-add-reminder" data-toggle="modal"  class="btn btn-sm btn-primary"> 
                            Add reminder 
                        </a>
                        <p class="margin-top-20">* all employees for whom you have view rights regarding the selected attributes.</p>
                        <div id="modal-edit-reminder" class="modal" tabindex="-1" role="dialog" aria-hidden="true" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit reminder</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>              
                                    </div>                                  
                              
                                    <div class="modal-body">
                                        <div class="alert alert-info"> 
                                            Changes made after 5:00 am CET will take effect starting from the next day. 
                                        </div>                  
                                        <div class="form-group row">
                                                <label class="col-md-3 control-label"> about </label>
                                            <div class="col-md-8">
                                                <select class="form-control mySelect2" name="automatic_date_field">
                                                    <option value="">Please select...</option>
                                                    <option value="probation_period_end">
                                                        Probation period end
                                                    </option>
                                                    <option value="hire_date">Hire date</option>
                                                    <option value="last_working_day">Last day of work</option>
                                                    <option value="contract_end_date">Contract ends</option>
                                                    <option value="termination_date">Termination date</option><option value="last_salary_change">Last salary change</option>
                                                    <option value="next_time_off_period">Next absence</option>
                                                    <option value="dynamic_808875">Birthday</option>
                                                    <option value="dynamic_808877">
                                                        Enrollment certificate valid until
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 control-label"> of 
                                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="The term &quot;All employees&quot; refers to all employees for whom you have view rights regarding the selected attribute. <br/>The term &quot;Own Team&quot; in Personio refers to and includes all the employees who share the same (direct or indirect) supervisor.<br>However, &quot;Direct Team&quot; includes only the employees who share the same direct supervisor."></i> 
                                            </label>
                                            <div class="col-md-8">
                                                <select class="form-control custom-select">
                                                    <option value="all" selected="selected">All employees</option>
                                                    <option value="special">Special</option>
                                                    <option value="direct_team">Direct team</option>
                                                    <option value="team">Own team</option>
                                                </select>
                                                <div class=" margin-top-5 boxs" id="special">
                                                    <div class="attributeFilterContainer"> </div>
                                                    <div id="education_fields"></div>                                                           
                                                    <a class="added" href="#add-attribute-filter" id="copy"> 
                                                        <i class="fas fa-plus-circle"></i> Add filter 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 control-label"> when </label>
                                            <div class="col-md-2"> 
                                                <input class="form-control required" number="" name="automatic_offset" type="text" value="4"> 
                                            </div>
                                            <div class="col-md-3"> 
                                                <select class="form-control valid" name="automatic_offset_unit">
                                                    <option value=""></option>
                                                    <option value="1">days</option>
                                                    <option value="7">weeks</option>
                                                </select> 
                                            </div>
                                            <div class="col-md-3"> 
                                                <select class="form-control" name="automatic_offset_sign">
                                                    <option value=""></option>
                                                    <option value="-1">before</option>
                                                    <option value="1">after</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div class="custom-control custom-radio show">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                                    <label class="custom-control-label" for="customControlValidation2">Reminder (automated expiration)</label>
                                                </div>                             
                                                <div class="custom-control custom-radio mb-3 d-hide">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                                                    <label class="custom-control-label" for="customControlValidation3">ask (no expiration)</label>                                     
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
                                                <input name="automatic_yearly" type="checkbox" value="1"> Yearly reminder 
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
                                        <button type="submit" class="btn btn-primary" id="add_employee_form_submit">Edit</button>
                                    </div>
                            
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
                                                <option value="own" selected="selected">Own</option>
                                            </select>
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
                                            <select class="form-control" data-calendar-id="start_end" name="calendar_acl[start_end]">
                                                <option value="none" selected="selected">None</option>
                                                <option value="global">Global</option>
                                                <option value="reports">Own team</option>
                                                <option value="department">Own department</option>
                                                <option value="office">Own office</option>
                                                <option value="subcompany">Own subcompany</option>
                                                <option value="custom">Custom...</option>
                                            </select>
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
                                            <select class="form-control" data-calendar-id="time_off=157356" name="calendar_acl[time_off=157356]">
                                                <option value="none">None</option>
                                                <option value="global" selected="selected">Global</option>
                                                <option value="reports">Own team</option>
                                                <option value="department">Own department</option>
                                                <option value="office">Own office</option>
                                                <option value="subcompany">Own subcompany</option>
                                                <option value="custom">Custom...</option>
                                            </select>
                                        </div>

                                        <div data-calendar="calendar_acl[time_off=157356]" class="row edit-rules" >
                                            <a href="edit-rules">Edit custom rules</a>
                                            <input name="calendar_acl_custom[time_off=157356]" type="hidden" value="">
                                        </div>

                                    </div>
                                </div>                        
                                <div class="form-group d-flex">
                                    <div class="col-md-9 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="far fa-arrow-right"></i> 
                                            Save changes
                                        </button>
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
                                    <p>
                                        This means that each employee in this role will have to enter an additional token generated by the <a href="" target="_blank">Google Authenticator</a> when logging in. This is <strong>not required</strong> for logins through their Google Account email.
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-4">
                                    <button type="reset" class="btn btn-default ">
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
                </div>    
             
            </div>                                       
            
            <div class="block-section tab-pane " id="tab2" role="tabpanel">
               
            </div>
        </div>
    </div>
</div>    
@endsection
@section('admin-additional-js')
<script src="{{ asset('admin/js/jquery.bootstrap-duallistbox.js') }}"></script>  
<script type="text/javascript">
        
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                    $(".boxs").hide();
                    $("#" + optionValue).show();
            });
        }).change();
    });

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
    });


 
     
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    $("#demoform").submit(function() {
        alert($('[name="duallistbox_demo1[]"]').val());
        return false;
    });
    var demo2 = $('.demo2').bootstrapDualListbox({
        nonSelectedListLabel: 'Non-selected',
        selectedListLabel: 'Selected',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
        nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
    });

    $(".select-chosen").select2({
        placeholder: "What type of attribute is this?",
        allowClear: true,
    });
</script>    
@endsection