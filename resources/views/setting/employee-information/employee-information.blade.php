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
            {{-- <div class="col-md-3 tab-secction">
                <div class="block-section customvtab vtabs row">
                    <button  class="my-button create" type="button" data-toggle="modal" data-target="#sectionCreate" data-whatever="@mdo"><div class="attrdiv"><div>Create a section</div></div></button>
                    <ul id="section-lists" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                    @foreach ($sections as $section)
                        <li class="nav-item"><a class="nav-link {{ $loop->iteration == 1? 'active':''}}" data-toggle="tab" href="#tab{{ $section->id }}" role="tab">{{ $section->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div> --}}
            <div class="col-lg-3 tab-section">
                {{-- <button  class="my-button create cr" type="button"><div class="attrdiv"><div>Create a section</div></div></button> --}}
                <button  class="my-button create cr" type="button" data-toggle="modal" data-target="#sectionCreate" data-whatever="@mdo"><div class="attrdiv"><div>Create a section</div></div></button>

                <div class="block-section customvtab vtabs ">                    
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
                                <div class="attrdiv">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="my-button addattr" data-toggle="modal" data-target="#addAttribute{{ $section->id }}">
                                    Add an attribute
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addAttribute{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="modal-title my-model" id="exampleModalLabel">Add an attribute to {{ $section->name ?? '' }}</div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                </div>
                                                <form action="{{ route('setting.attribute.store') }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input placeholder="Name your attribute" name="attribute" class="form-control name-attr" value="">
                                                        </div>
                                                        <div>
                                                            <div class="col-md-6 mb-2">
                                                                <select class="form-control custom-select select-chosen select2 attrType" name="attr_type" data-section-id="{{ $section->id }}" name="type" aria-hidden="true">
                                                                    <option value="" disabled selected>What type of attribute is this?</option>
                                                                    @foreach ($section->attributeTypes() as $key => $attributeType)
                                                                    <option value="{{ $key }}">{{ $attributeType }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="add-option-attr-{{ $section->id }}" class="boxs attr-{{ $section->id }}" style="display: none;">
                                                            <div class="attributeFilterContainer">
                                                                <div class="input-group mb-3 m-input">
                                                                    {{-- <div class="row"> --}}
                                                                        <input type="text" name="option[]" class="form-control col-md-10" aria-describedby="basic-addon2">
                                                                        <div class="input-group-append col-md-2">
                                                                            {{-- <button class="btn btn-outline-secondary mr-2" type="button"><i class="fas fa-trash" data-toggle="tooltip" data-title="Delete" data-original-title="" title=""></i></button> --}}
                                                                        </div>
                                                                    {{-- </div> --}}
                                                                </div>
                                                                <span id="option-field"></span>
                                                                <a class="added" href="#" id="addOption" data-section-id="{{ $section->id }}"> Add an option </a>
                                                            </div>
                                                        </div>
                                                        <div id="decimal-number-attr-{{ $section->id }}" class="boxs attr-{{ $section->id }}" style="display: none;">
                                                            <div class="col-md-6 d-flex num-decimal">
                                                                <label class="uniqueid" for="">Number of Decimals</label>
                                                                <select class="select-chosen select2 attr-input-{{ $section->id }}" name="decimal_number" aria-hidden="true">
                                                                    @foreach ($section->decimalNumbers() as $key => $decimal)
                                                                    <option value="{{ $key }}">{{ $decimal }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="is-unique-attr-{{ $section->id }}" class="boxs attr-{{ $section->id }}" style="display: none;">
                                                            <div class="col-md-6 d-flex">                                                
                                                                <label class="is-unique-id" for="is_unique-{{ $section->id }}">Unique Id</label>
                                                                <input type="checkbox" name="is_unique" value="1" class="check attr-input-{{ $section->id }}" id="is-unique-{{ $section->id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-info">Add</button>
                                                    </div>
                                                </form>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="margin-left:10px;">
                                    <button class="btn  btn-light dropdown my-button create" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                                        <div class="attrdiv">
                                            <div>
                                                <i class="fas fa-ellipsis-h" style="font-size: 14px;"></i>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-99px, 36px, 0px);">
                                        <a class="dropdown-item" href data-toggle="modal" data-target="#renameSection{{ $section->id }}">Rename Section </a>
                                        <a class="dropdown-item" href data-toggle="modal" data-target="#deleteSection{{ $section->id }}">Delete Section</a>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                

                                <!-- Modal Rename section -->
                                <div class="modal fade" id="renameSection{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="#renameSectionLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="renameSectionLabel">Rename section</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('setting.section.update.name') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input placeholder="Emergency contact" name="name" class="form-control name-attr" value="{{ $section->name }}">
                                                        <input type="hidden" name="section" value="{{ $section->id }}">
                                                    </div> 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--  and Modal Rename section -->

                                <!-- Modal delete section -->
                                <div class="modal fade" id="deleteSection{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="#deleteSectionLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteSectionLabel">Delete section Emergency contact?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="delete-section">
                                                <p class="">Once you delete a section, it's gone for good.</p>
                                                <ul class="dl-ul">
                                                    <li>All attributes assigned to this section will also be deleted</li>
                                                    <li>All employee data you entered for these attributes will be lost</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
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
                @endforeach
            </div>      
        </div>      
    </div>
@endsection

@section('admin-additional-js')
    <!--Custom JavaScript -->
    <script src=".{{ asset('admin/assets/plugins/moment/moment.js') }}" type="text/javascript"></script>
    <script src=".{{ asset('admin/assets/plugins/footable/js/footable.min.js') }}"></script>     
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <script src="js/jquery.bootstrap-duallistbox.js') }}"></script>
    <script src=".{{ asset('admin/assets/plugins/select2/dist/js/select2.min.js') }}"></script>

    {{-- <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> --}}

    <script>
        let option = 1;
        $(document).ready(function(){
            $(document).on('change', '.attrType', function() {
            // $('.attrType').on('change', function() {
                let section_id = $(this).data('section-id');
                console.log(section_id);
                console.log('#is-unique-'+section_id);
                $('.attr-'+section_id).hide();
                $('.attr-input-'+section_id).val('');
                if($(this).val() == 0){
                    $('#is-unique-attr-'+section_id).show();
                    $('#is-unique-'+section_id).val('1');
                }else if($(this).val() == 1 || $(this).val() == 7){
                    $('#add-option-attr-'+section_id).show();
                }else if($(this).val() == 2){
                    $('#is-unique-attr-'+section_id).show();
                    $('#is-unique-'+section_id).val('1');
                }else if($(this).val() == 3){
                    $('#decimal-number-attr-'+section_id).show();
                    $('#is-unique-attr-'+section_id).show();
                    $('#is-unique-'+section_id).val('1');
                }
            });

            $('#addOption').click(function() {
                section_id = $(this).data('section-id');
                option++;
                $('#option-field').append(`<div class="input-group mb-3 m-input" id="remove-`+option+`">
                                                <input type="text" name="option[]" class="form-control col-md-10" aria-describedby="basic-addon2">
                                                <div class="input-group-append col-md-2">
                                                    <a href="#" class="btn btn-outline-secondary mr-2 removeOption" data-option="`+option+`" type="button"><i class="fas fa-trash" data-title="Delete" ></i></a>
                                                </div>
                                            </div>`);
            });

            $(document).on('click', '.removeOption', function() {
                let removeOption = $(this).data('option');
                $('#remove-'+removeOption).remove();
            });
        });
    </script>
@endsection