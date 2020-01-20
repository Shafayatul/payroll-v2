@extends('layouts.admin.master')
@section('title', 'Payroll Settings')
@section('admin-additional-css')

{{-- Custom CSS --}}
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/departments.css') }}"  rel="stylesheet" media="all">
 <link href="{{ asset('admin/css/employee-information.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
    <div class="background-white shadowed-box ">
        <div class="row">
            <header class="employee-header">
                <h1 class="employee-title">Employee information</h1>
                <p class="">Manage all your attributes and sections from here. Add, edit and delete attributes or sections.</p>
            </header>
        </div>
        <div class="row gutter30">
            <div class="col-md-3 tab-secction">
                <div class="block-section customvtab vtabs row">
                    <button  class="my-button create" type="button" data-toggle="modal" data-target="#sectionCreate" data-whatever="@mdo"><div class="attrdiv"><div>Create a section</div></div></button>
                    <ul id="section-lists" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                    @foreach ($sections as $section)
                        <li class="nav-item"><a class="nav-link {{ $loop->iteration == 1? 'active':''}}" data-toggle="tab" href="#tab{{ $section->id }}" role="tab">{{ $section->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 tab-content">
            @foreach ($sections as $section)
                <div class="block-section tab-pane {{ $loop->iteration == 1? 'active':''}}" id="tab{{ $section->id }}" role="tabpanel">
                    <div id="accordion">
                        <div class="accordion-header">
                            <div class="accordion-header-title">{{ $section->name }}</div>
                            <div class="b-group">
                                <button data-test-id="add-new-attribute-button" class="my-button addattr" type="button" data-toggle="modal" data-target="#attributeCreate" data-whatever="@mdo"><div class="attrdiv"><div>Add an attribute</div></div></button>
                                <div class="">
                                    <div data-test-id="section-options-button" class="_1-53j">
                                        <button class="my-button " type="button">
                                            <div class="attrdiv">
                                                <div>
                                                    <i class="fas fa-ellipsis-h" style="font-size: 14px;">
                                                    </i>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($section->employeeDetailAttributes as $attribute)
                        <div class="card">
                            <div class="panel-heading" id="headingOne">                                                
                                <div class="name collapsed " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-angle-right right-icon change" ></i>                             
                                    <span class="coll-title name-1" data-editable>{{ $attribute->name }}</span>
                                    <input class="G2Mft name-2" type="text" name="" value="{{ $attribute->name }}">
                                    <i class="fas fa-lock icon" ></i>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    <div data-test-id="edit-attribute-type-list">
                                        <input name="deprecated-select" class="G2Mft strings " value="string">
                                    </div>
                                    <div class="_333holGKf6kP50GkaibUzr">
                                        <label class="uniqueid">Unique Id</label>
                                        <input disabled="" data-test-id="edit-attribute-restriction-is-unique" type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 
                </div>
                
                @include('setting.employee-information.modal-add-attribute')

            @endforeach
                <div class="tab-pane p-3" id="tab2" role="tabpanel">
                    <div id="accordion">
                        <div class="accordion-header">
                            <div class="accordion-header-title">Public profile</div>
                                <div class="b-group">
                                    <button data-test-id="add-new-attribute-button" class="my-button addattr" type="button">
                                        <div class="attrdiv"><div>Add an attribute</div></div>
                                    </button>
                                    <div class="">
                                    <div data-test-id="section-options-button" class="_1-53j">
                                        <button class="my-button " type="button">
                                            <div class="attrdiv">
                                                <div>
                                                    <i class="fas fa-ellipsis-h" style="font-size: 14px;"></i>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label"> Public holidays </label>
                            <div class="col-md-5">
                                <select class="select-chosen form-control"  >
                                    <option value="null">Same as company</option>
                                    <optgroup label="System holiday calendars">
                                        <option value="1">DE Feiertage</option>
                                        <option value="2">DE (Bayern) Feiertage</option>
                                        <option value="6">DE (Berlin) Feiertage</option>
                                        <option value="7">DE (Baden-Wuerttemberg) Feiertage</option>
                                        <option value="8">DE (Brandenburg) Feiertage</option>
                                        <option value="9">DE (Bremen) Feiertage</option>
                                        <option value="10">DE (Hamburg) Feiertage</option>
                                        <option value="11">DE (Hessen) Feiertage</option>
                                        <option value="12">DE (Mecklenburg-Vorpommern) Feiertage</option>
                                        <option value="13">DE (Niedersachsen) Feiertage</option>
                                        <option value="14">DE (NRW) Feiertage</option>
                                        <option value="15">DE (Rheinland-Pfalz) Feiertage</option>
                                        <option value="16">DE (Saarland) Feiertage</option>
                                        <option value="17">DE (Sachsen) Feiertage</option>
                                        <option value="18">DE (Sachsen-Anhalt) Feiertage</option>
                                        <option value="19">DE (Schleswig-Holstein) Feiertage</option>
                                        <option value="20">DE (Thueringen) Feiertage</option>
                                        <option value="56">FR public holidays</option>
                                        <option value="57">China public holidays</option>
                                        <option value="189">UK bank holidays</option>
                                        <option value="203">Northern Ireland bank holidays</option>
                                        <option value="205">US federal holidays</option>
                                        <option value="207">Austria public holidays</option>
                                        <option value="209">France public holidays</option>
                                        <option value="211">Canada public holidays</option>
                                        <option value="213">Italy public holidays</option>
                                    </optgroup>
                                </select>                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible();"><i class="fas fa-times"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>
    @include('setting.employee-information.modal-section-create') 
@endsection

@section('admin-additional-js')
    <!--Custom JavaScript -->
    <script src=".{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script>
    <script src=".{{ asset('admin/assets/plugins/footable/js/footable.min.js') }}"></script>     
    <script src="{{ asset('admin/js/main.js') }}"></script>
   
     <script src="js/jquery.bootstrap-duallistbox.js') }}"></script>
     <script src=".{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>

    {{-- <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> --}}
@endsection