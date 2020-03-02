@extends('layouts.admin.master')
@section('title', 'Companies')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/company.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Companies</a></li>
            <li class="breadcrumb-item active">Companies</li>
        </ol>
    </div>
</div>
@include('layouts.admin.include.alert')
<div class="company-submenu-content ">
    <!-- Block Tabs -->
    <div class="block block-tabs full">
        <div class="tab-content">
            <div class="tab-pane active">
                <h2 class="company-title">Company</h2>
                <br>
                <div class="alert alert-warning">
                    This account was pre-filled with demo employees.
                    To clear all demo data, please 
                    <a href="" class="text-warning ">complete the setup wizard</a>.
                </div>
                <div class="row gutter30">
                    <div class="col-md-12 tab-content">
                        <div class="block-section">
                            <h4 class="sub-header">
                                Company information
                                {{-- <small> --}}
                                {{-- <a href="javascript:void(0)" class="edit-toggle" data-toggle="modal" data-target="#company-{{ $company->id }}">
                                    (Edit)
                                </a> --}}
                                <small>
                                    <a href="javascript:void(0)" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible1();">(Edit)</a>
                                </small>
                                {{-- </small> --}}
                            </h4>
                            <div id="status-page-info-react-entrypoint" class="status">
                                <div class="_1eEHQ">
                                    <div class="_1A_Fo _3SL8z _3d3hy">
                                       <div class="_3eTCz">
                                           <div>
                                              <i class="fas fa-info-circle _3A0CB" ></i>
                                            </div>
                                            <div class="_3d3hy">
                                              <div> Visit<a href="" target="_blank" rel="noopener noreferrer">
                                                https://status.saiful.de
                                                </a> for info on any maintenance work we do on Personio. 
                                                If you'd like to stay up-to-date at all times, you can also
                                                 subscribe to our email notification service there.
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal form-striped compact" id="company-data">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Company name</label>
                                    <div class="col-md-5">
                                        <p class="form-control-static">{{ $company->name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Sub-companies enabled
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-title="When you enable sub-companies you will be able to assign each employee to a subcompany which will affect reports, payroll and other related grouped views of your employees" data-original-title="" title="">                                   
                                        </i>
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        @if($company->is_sub_company_enable == 1)
                                            <span class="text-success">Yes</span>
                                        @else
                                            <span class="text-danger">No</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <label class="col-md-4 control-label">
                                    Email notifications enabled
                                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" data-title="If enabled, users will be able to receive email notifications, e.g., for approval requests or reminders. Users can adjust this in their personal settings. If disabled, Personio won't send notification emails to anyone within the company. Not affected by this setting are 1) Personio invites, e.g., when a new employee is provided with a Personio login, and 2) manually typed and sent emails, e.g., an onboarding welcome email." data-original-title="" title="">
                                            
                                        </i>
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        @if($company->is_email_notification_enable == 1)
                                            <span class="text-success">Yes</span>
                                        @else
                                            <span class="text-danger">No</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Language preference
                                    </label>
                                    <div class="col-md-5">
                                        <p class="form-control-static">
                                            @if($company->language == 'en')
                                                English
                                            @elseif($company->language == 'de')
                                                Deutsch
                                            @else
                                                Not Selected
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Default currency
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        {{ $company->currency }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Industry
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        @isset($industries[$company->industry_id])
                                            {{ $industries[$company->industry_id] }}
                                        @endisset
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Timezone
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        {{ $company->timezone }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Public holidays
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                            {{ $company->calendar->name }}
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Logo
                                    </label>
                                    <div class="col-md-8 form-control-static configuration-logo-container">
                                        <img src="{{ asset('storage/company-logo/'.$company->logo) }}" alt="" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                            </div>

                        {!! Form::model($company, [
                            'method' => 'PATCH',
                            'route' => ['companies.update', $company->id],
                            'class' => 'form-horizontal',
                            'id' => 'company-edit-form',
                            'files' => true,
                            'novalidate' => 'novalidate'
                        ]) !!}
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Company name
                                    </label>
                                    <div class="col-md-5">
                                        <input class="form-control" name="name" type="text" value="{{ $company->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Sub-companies enabled
                                    </label>
                                    <div class="col-md-5 form-control-static">
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" name="is_sub_company_enable" id="checkbox3" @isset($company->is_sub_company_enable) @if($company->is_sub_company_enable == 1) ? checked @endif @endisset>
                                            <label for="checkbox3" style="width: 4% !important"> Yes </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-4 control-label">
                                    Email notifications enabled
                                </label>
                                    <div class="col-md-5 form-control-static">
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" name="is_email_notification_enable" id="checkbox2" @isset($company->is_email_notification_enable) @if($company->is_email_notification_enable == 1) ? checked @endif @endisset>
                                            <label for="checkbox2" style="width: 4% !important"> Yes </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Language preference
                                    </label>
                                    <div class="col-md-5">
                                        {!! Form::select('language', ['' => '--Select Language--', 'en' => 'English', 'de' => 'German'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Default currency
                                    </label>
                                    <div class="col-md-5">  
                                        <select name="currency" class="form-control select2" required>
                                            <option value="">--Select Currency--</option>
                                            @foreach($currencies as $key => $value)
                                                <option value="{{ $value->abbreviation }}" @isset($company->currency) @if($value->abbreviation == $company->currency) ? selected @endif @endisset>
                                                    {!! $value->abbreviation.' ('.$value->symbol.')' !!}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Industry
                                    </label>
                                    <div class="col-md-5">
                                        {!! Form::select('industry_id', $industries, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Industry--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Industry--']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Timezone
                                    </label>
                                    <div class="col-md-5">
                                        <select name="timezone" class="form-control select2" required>
                                            <option value="">--Select Timezone--</option>
                                            @foreach($timezones as $value)
                                                <option value="{{ $value }}" @isset($company->timezone) @if($value == $company->timezone) ? selected @endif @endisset>
                                                    {!! $value !!}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>     
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Public holidays
                                    </label>
                                    <div class="col-md-5">
                                        {!! Form::select('public_holiday_calendar_id', $public_holiday_calendars, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Public Holiday--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Public Holiday--']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Email contacts for maintenances
                                        <i class="fa fa-info-circle" data-toggle="tooltip" title="" data-original-title="The specified contacts will receive notifications regarding maintenances. We recommend to provide a contact from your HR and IT team."></i>
                                    </label>
                                    <div class="col-md-8">
                                        <div class="tags-default">
                                            {!! Form::text('contact_for_maintenance[]', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'data-role' => 'tagsinput'] : ['class' => 'form-control', 'data-role' => 'tagsinput']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">
                                        Logo
                                    </label>
                                    <div class="col-md-8 configuration-logo-container">
                                        {!! Form::file('logo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        <br><br>
                                        <div class="form-group">
                                            <img src="{{ asset('storage/company-logo/'.$company->logo) }}" alt="" style="width: 200px; height: 200px;">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible1();">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-arrow-right"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
                <div id="modal-enable-subcompanies" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Warning</h4>
                            </div>
                            <div class="modal-body">
                                <p>You’re about to activate subcompanies. Due to technical constraints, this will lead to loss of history data in your payroll wherever past payrolls have not been closed. Before proceeding, please get in touch with our support team.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default" data-dismiss="modal">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-section">
                    <h4 class="sub-header">
                        Delete trial account
                    </h4>
                    <div>
                        <p>
                            Delete your trial account and all data associated with it permanently. You will no longer have access to your account or data.
                        </p>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['companies.destroy', $company->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('Delete everything now', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'title' => 'Delete everything now',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
    
                <div id="company-export">
                    <div class="block-section">
                        <h4 class="sub-header">Data export</h4>
                        <div>
                            <p>Export all data and documents associated with your company stored in Personio. After creating an export, you'll be able to download it as a zip file.  (A zip extractor is required to open the export.)</p>
                            <button data-action-name="dataportability-send" data-test-id="dataportability-send" type="button" class="btn btn-primary">Create new data export</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-additional-js')
<script type="text/javascript">
    document.getElementById('company-edit-form').style.display = 'none';
    function switchVisible1() {
        if (document.getElementById('company-edit-form')) {

            if (document.getElementById('company-edit-form').style.display == 'none') {
                document.getElementById('company-edit-form').style.display = 'block';
                document.getElementById('company-data').style.display = 'none';
            }else {
                document.getElementById('company-edit-form').style.display = 'none';
                document.getElementById('company-data').style.display = 'block';
            }
        }
    }
</script>
@endsection