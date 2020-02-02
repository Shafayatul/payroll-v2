@extends('layouts.admin.master')
@section('title', 'Cost Center')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/office.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="row gutter30">
    <div class="col-md-4">
        <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Cost Center</h4>
            <form method="POST" action="{{ url('/cost-centers') }}" accept-charset="UTF-8" id="new_cost_center_form" novalidate="novalidate">
                @csrf
                <div class="input-group input-group-sm"> 
                    <input class="form-control" placeholder="New Cost Center..." required="" minlength="2" name="name" type="text">
                    <span class="input-group-btn"> 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button> 
                    </span> 
                </div> 
            </form>
            <br>

            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                @foreach($costcenters as $item)
                    <li class="nav-item"> 
                    <a class="nav-link office-edit {{$loop->iteration == 1? 'active':''}}" serial="{{ $item->id }}" data-toggle="tab" onclick="openTab({{ $item->id }})" role="tab">{{ $item->name }}
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        @foreach ($costcenters as $costcenter)
        <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}}" id="tab{{ $costcenter->id }}" role="tabpanel">
            <h4 class="sub-header">
                <span class="office_name">{{ $costcenter->name }}</span> 
                <small> 
                    <a href="#" class="edit-toggle"  onclick="updateOffice({{ $costcenter->id }});" data-toggle="tooltip" data-original-title="" title="">(Edit)</a> 
                </small> 
                {!! Form::open([
                    'method'=>'DELETE',
                    'route' => ['cost-centers.destroy', $costcenter->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> ', array(
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger pull-right',
                            'title' => 'Delete this office',
                            'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                {!! Form::close() !!} 
            </h4>

            <div class="form-horizontal form-striped compact costcenter-details" id="costcenter-div{{$costcenter->id}}">
                <div class="form-group row"><label class="col-md-3 control-label"> Cost Center name </label>
                    <div class="col-md-5"> <p class="form-control-static"><span class="office_name">{{ $costcenter->name }}</span></p> </div>
                </div>
            </div>
            {!! Form::model($costcenter, [
                'method' => 'PATCH',
                'route' => ['cost-centers.update', $costcenter->id],
                'class' => 'form-horizontal costcenter-update-form',
                'id' => "costcenter-$costcenter->id",
                'files' => true,
                'novalidate' => 'novalidate',
                'style' => 'display:none'
            ]) !!}

            <div class="form-group row">
                <label class="col-md-3 control-label">
                    Cost Center name
                </label>
                <div class="col-md-5">
                    <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="{{ $costcenter->name }}">
                </div>
            </div>

                
            <div class="form-group row">
                <div class="col-md-9 col-md-offset-3">
                    <button type="reset" class="btn btn-default edit-cancel" onclick="cancelUpdate({{ $costcenter->id }});"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
                    
        @endforeach
    </div>
</div>
@endsection
@section('admin-additional-js')
 <script type="text/javascript">
     
    // function switchVisible() {
    //     if (document.getElementById('office-div')) {

    //         if (document.getElementById('office-div').style.display == 'none') {
    //             document.getElementById('office-div').style.display = 'block';
    //             document.getElementById('office').style.display = 'none';
    //         }
    //         else {
    //             document.getElementById('office-div').style.display = 'none';
    //             document.getElementById('office').style.display = 'block';
    //         }
    //     }
    // }

    function openTab(id){
        $('.tab-pane').hide();
        $('.costcenter-update-form').hide();
        $('#tab'+id).show();
        // $('#office'+id).attr('style', 'display:none !important');
        $('#costcenter-div'+id).show();
    }
    function updateOffice(id) {
        $('.costcenter-details').hide();
        $('#costcenter-'+id).show();
    }
    function cancelUpdate(id){
        $('#costcenter-'+id).hide();
        $('#costcenter-div'+id).show();
    }
    // function switchVisible2() {
    //     if (document.getElementById('office-div2')) {

    //         if (document.getElementById('office-div2').style.display == 'none') {
    //             document.getElementById('office-div2').style.display = 'block';
    //             document.getElementById('office2').style.display = 'none';
    //         }
    //         else {
    //             document.getElementById('office-div2').style.display = 'none';
    //             document.getElementById('office2').style.display = 'block';
    //         }
    //     }
    // }

$(document).ready(function() {
    $('.select-chosen').select2();

    // $(".office-edit").click(function() {
    //     var office_id = $(this).attr('serial');
    //     $.ajax({
    //         'url' : "{{ url('get-ajax-office-data') }}/"+office_id,
    //         'type' : 'GET',
    //         success: function (response) {
    //             console.log(response);
    //             $("#office-tab").show(500);
    //             $(".office_name").text(response.name);
    //             $(".office_currency").text(response.currency);
    //             $(".office_timezone").text(response.timezone);
    //             $(".office_public_hoilday").text(response.calendar.name);
    //             $(".office_street").text(response.street);
    //             $(".office_zip_city").text(response.zip+', '+response.city);
    //             $(".office_state_country").text(response.state+', '+response.country);
    //         }
    //     });
    // });
});



  </script>
@endsection