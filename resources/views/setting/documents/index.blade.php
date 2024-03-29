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
                <a class="nav-link" data-toggle="tab" href="#Template" onclick="tabPan('Template');" role="tab">Template</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#document-category" onclick="tabPan('document-category');" role="tab">Category</a> 
            </li>
        </ul>
        <div class="tab-content">
            <div id="Template" class="active">                       
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Templates</h4>
                            <br>
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                                @foreach($categories as $category)
                                    <li class="nav-item">
                                        <strong>
                                            {{ $category->name }}
                                        </strong>
                                        @php
                                            $loo = $loop->iteration;
                                        @endphp
                                   </li>
                                @foreach($category->templates as $template)
                                    <li class="nav-item">
                                        <a class="pl-2 nav-link" href="#" data-toggle="tab" onclick="openTab({{ $template->id }});" role="tab">{{ $template->name }}</a>
                                    </li>
                                @endforeach
                                       
                                   
                                @endforeach
                            </ul>
                            <br/>
                            <a data-toggle="modal" data-target="#add-template" class="btn btn-default" style="width: 100%;"> 
                                <i class="fas fa-plus-circle" data-toggle="tooltip" title="" data-original-title="Add this Template"></i> Add Template 
                            </a>


                            <div class="modal fade" id="add-template" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="POST" class="form-vertical" action="{{ route('documents.template-upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    Upload Template
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="category">
                                                        Category
                                                    </label>
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="category" name="category_id" required>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">
                                                        Template Name
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="lang">
                                                        Template Language
                                                    </label>
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="lang" name="lang" required>
                                                            @foreach($langs as $key => $lang)
                                                                <option value="{{ $key }}">{{ $lang }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="category">
                                                        Template
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="file" name="template_file" class="form-control" required>
                                                        <p>
                                                            Currently we only support templates that are stored in DOCX/DOTX (MS Office 2007 and later) or ODT/OTT (OpenOffice) formats.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Upload
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($categories as $category)
                            @foreach($category->templates as $template)
                                <div class="block-section tab-pane" id="tab{{ $template->id }}" role="tabpanel">
                                    <h4 class="sub-header">{{ $template->name }}</h4>
                                    <div class="pull-right">
                                        <a data-toggle="modal" data-target="#exampleModal-1"> <i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a> 
                                                                            
                                    </div>

                                    <div class="form-group">
                                        <label for="lang">
                                            Template Language
                                        </label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="lang" name="lang" required>
                                                @foreach($langs as $key => $lang)
                                                    <option value="{{ $key }}">{{ $lang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <iframe class="template" id="pdfviewer-{{ $template->id }}" value="{{ $template->template_file }}" src="{{ url('storage/'.$template->template_file) }}" type="application/pdf"  width="100%" height="500px"></iframe>

                                    <small>
                                        <a class="btn btn-sm btn-primary" href="{{ url('storage/'.$template->template_file) }}" download="{{ url('storage/'.$template->template_file) }}">Download</a>
                                    </small>
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                </div>
                            @endforeach
                        @endforeach
                    </div>

                </div>   
            </div>
        </div>  
            <div id="document-category" class="fade">
                <div class="d-flex gutter30">
                    <div class="col-md-4">
                        <div class="block-section customvtab vtabs row">
                            <h4 class="sub-header">Category</h4>
                            <form method="POST" action="{{ route('document-category.store') }}" accept-charset="UTF-8" novalidate="novalidate">
                            @csrf
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="New step..." required="" minlength="2" name="name" type="text">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>                                   
                            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" role="tablist">
                                @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($loop->iteration == 1) ? 'active' : '' }}" data-toggle="tab" onclick="stepPan({{ $category->id }});" role="tab">
                                       {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 tab-content">
                        @foreach($categories as $category)
                        <div class="block-section step-tab-pane" {{ ($loop->iteration == 1) ? 'class=active' : 'style=display:none;' }} id="step-tab{{ $category->id }}" role="tabpanel">
                            <h4 class="sub-header">
                                
                                <small>
                                    <a class="edit-toggle" data-toggle="modal" title="" data-target="#edit-step-{{ $category->id }}">{{ $category->name }}(Edit)</a>
                                </small>
                                <a href="#modal-delete-step" data-toggle="modal">
                                    <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this step"></i>
                                </a>
                            </h4>

                            <div class="form-horizontal form-striped compact department-details" id="department-div{{$category->id}}">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label"> Category name </label>
                                    <div class="col-md-5"> 
                                        <p class="form-control-static">
                                            <span class="office_name">{{ $category->name }}</span>
                                        </p> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label"> Sort Order </label>
                                    <div class="col-md-5"> 
                                        <p class="form-control-static">
                                            <span class="office_name">{{ $category->sort_order }}</span>
                                        </p> 
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edit-step-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-temLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('document-category.update') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="edit-temLabel">
                                                    Catgeory name
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group d-flex">
                                                    <label class="col-md-3 control-label">Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control " required="" name="name" placeholder="Category Name" type="text" value="{{ $category->name }}">
                                                        <input type="hidden" name="document_category_id" value="{{ $category->id }}">
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex">
                                                    <label class="col-md-3 control-label">Sort Order</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control " required="" name="sort_order" placeholder="Category Sort Order" type="text" value="{{ $category->sort_order }}">
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
                        </div>
                        @endforeach
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

    // $(function() {

    //   var pdfsrc = "admin/assets/pdf/sample.pdf";

    //   var script = $("<script>");

    //   fetch(pdfsrc)
    //   .then(function(response) {
    //     return response.arrayBuffer()
    //   })
    //   .then(function(data) {
    //     // do stuff with `data`
    //     console.log(data, data instanceof ArrayBuffer);
    //     $("#pdfviewer").attr("src", URL.createObjectURL(new Blob([data], {
    //         type: "application/pdf"
    //     })))
    //   }, function(err) {
    //       console.log(err);
    //   });

    // });

    function tabPan(id)
    {
        if(id == 'Template'){
            $("#Template").show();
            $("#document-category").hide();
        }else{
            $("#Template").hide();
            $("#document-category").show();
        }
    }

    function openTab(id){
        console.log(id);
        $('.tab-pane').hide();
        $('#tab'+id).show();
    }
    // function updateDepartment(id) {
    //     $('.department-details').hide();
    //     $('#department-'+id).show();
    // }
    // function cancelUpdate(id){
    //     $('#department-'+id).hide();
    //     $('#department-div'+id).show();
    // }

    function stepPan(id){
        console.log(id);
        $('.step-tab-pane').hide();
        $('#step-tab'+id).show();
        $('#department-div-'+id).show();
    }

    function updateCategory(id) {
        $('.department-details').hide();
        $('#department-'+id).show();
    }
    function cancelCategory(id){
        $('#department-'+id).hide();
        $('#department-div'+id).show();
    }

   
</script>
@endsection