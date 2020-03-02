@extends('layouts.admin.master')
@section('title', 'Offices')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/office.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
@include('layouts.admin.include.alert')
<div class="row gutter30">
    <div class="col-md-4">
        <div class="block-section customvtab vtabs row">
            <h4 class="sub-header">Offices</h4>
            <form method="POST" action="{{ url('/offices') }}" accept-charset="UTF-8" id="new_office_form" novalidate="novalidate">
                @csrf
                <div class="input-group input-group-sm"> 
                    <input class="form-control" placeholder="New office..." required="" minlength="2" name="name" type="text">
                    <span class="input-group-btn"> 
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </button> 
                    </span> 
                </div> 
            </form>
            <br>

            <ul id="office_list" class="nav nav-tabs tabs-vertical" data-toggle="tabs" ole="tablist">
                @foreach($offices as $office)
                    <li class="nav-item"> 
                    <a class="nav-link office-edit {{$loop->iteration == 1? 'active':''}}" serial="{{ $office->id }}" data-toggle="tab" onclick="openTab({{ $office->id }})" role="tab">{{ $office->name }}<span class="badge pull-right" data-toggle="tooltip" title="" data-original-title="7 active employees, 9 total">
                                {{ count($office->users) }}
                            </span>
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        @foreach ($offices as $office)
        <div class="block-section tab-pane {{$loop->iteration == 1? 'active':''}}" id="tab{{ $office->id }}" role="tabpanel">
            <h4 class="sub-header">
                <span class="office_name">{{ $office->name }}</span> 
                <small> 
                    <a href="#" class="edit-toggle"  onclick="updateOffice({{ $office->id }});" data-toggle="tooltip" data-original-title="" title="">(Edit)</a> 
                </small> 
                {!! Form::open([
                    'method'=>'DELETE',
                    'route' => ['offices.destroy', $office->id],
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

            <div class="form-horizontal form-striped compact office-details" id="office-div{{$office->id}}">
                <div class="form-group row"><label class="col-md-3 control-label"> Office name </label>
                    <div class="col-md-5"> <p class="form-control-static"><span class="office_name">{{ $office->name }}</span></p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Currency </label>
                    <div class="col-md-5">
                        <p class="form-control-static office_currency">{!! $office->currency ?? '<i>(Company default)</i>' !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5 form-control-static office_timezone">{!!  $office->timezone ?? '<i>(Company default)</i>' !!}<br>  </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Street </label>
                    <div class="col-md-5"> <p class="form-control-static office_street">Abbey Road 112</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> ZIP, City </label>
                    <div class="col-md-5"><p class="form-control-static office_zip_city">Abbey Road 112 </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> State, Country </label>
                    <div class="col-md-5"> <p class="form-control-static office_state_country">Abbey Road 112 </p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Public holidays </label>
                    <div class="col-md-5">
                        <p class="form-control-static office_public_hoilday"> {!! $office->calendar ?? $office->company->calendar->name .'<i>(from company)</i>'  !!}</p>
                    </div>
                </div>
            </div>
            {!! Form::model($office, [
                'method' => 'PATCH',
                'route' => ['offices.update', $office->id],
                'class' => 'form-horizontal office-update-form',
                'id' => "office-$office->id",
                'files' => true,
                'novalidate' => 'novalidate',
                'style' => 'display:none'
            ]) !!}
            {{-- <form method="POST" action="{{ route('offices.update', $office->id)  }}" accept-charset="UTF-8" style="display:none" class="form-horizontal office-update-form" id="office-{{$office->id}}" novalidate="novalidate">
                @csrf
                @method('PUT') --}}
                <input name="update_office_id" type="hidden" value="{{$office->id}}">
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="{{ $office->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Currency
                    </label>
                    <div class="col-md-5">
                        <select name="currency" class="form-control select2" required>
                            <option value="">--Select Currency--</option>
                            @foreach($currencies as $key => $value)
                                <option value="{{ $value->abbreviation }}" @isset($office->currency) @if($value->abbreviation == $office->currency) ? selected @endif @endisset>
                                    {!! $value->abbreviation.' ('.$value->symbol.')' !!}
                                </option>
                            @endforeach
                        </select> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5">
                        <select name="timezone" class="form-control select2" required>
                            <option value="">--Select Timezone--</option>
                            @foreach($timezones as $value)
                                <option value="{{ $value }}" @isset($office->timezone) @if($value == $office->timezone) ? selected @endif @endisset>
                                    {!! $value !!}
                                </option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Street
                    </label>
                    <div class="col-md-4">
                    <input class="form-control" placeholder="Street" name="street" type="text" value="{{ $office->street }}">
                    </div>
                    <div class="col-md-1">
                        <input class="form-control" placeholder="House number" name="house" type="text"  value="{{ $office->house }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 col-md-offset-3">
                        <input class="form-control" placeholder="Additional address information" name="street_additional" type="text" value="{{ $office->street_additional }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        ZIP, City
                    </label>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="ZIP code" name="zip" type="text" value="{{ $office->zip }}">
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" placeholder="City" name="city" type="text" value="{{ $office->city }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        State, Country
                    </label>
                    <div class="col-md-2">
                        <input class="form-control state-text" placeholder="State" name="state" type="text" value="{{ $office->state }}">
                        
                    </div>
                    <div class="col-md-3">
                           <input class="form-control state-text" placeholder="Country" name="country" type="text" value="{{ $office->country }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label"> Public holidays </label>
                    <div class="col-md-5">
                        {!! Form::select('public_holiday_calendar_id', $public_holiday_calendars, null, ('' == 'required') ? ['class' => 'form-control select2', 'required' => 'required', 'placeholder' => '--Select Public Holiday--'] : ['class' => 'form-control select2', 'placeholder' => '--Select Public Holiday--']) !!}                  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-default edit-cancel" onclick="cancelUpdate({{ $office->id }});"><i class="fas fa-times"></i> Cancel</button>
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
        $('.office-update-form').hide();
        $('#tab'+id).show();
        // $('#office'+id).attr('style', 'display:none !important');
        $('#office-div'+id).show();
    }
    function updateOffice(id) {
        $('.office-details').hide();
        $('#office-'+id).show();
    }
    function cancelUpdate(id){
        $('#office-'+id).hide();
        $('#office-div'+id).show();
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

    $(".office-edit").click(function() {
        var office_id = $(this).attr('serial');
        $.ajax({
            'url' : "{{ url('get-ajax-office-data') }}/"+office_id,
            'type' : 'GET',
            success: function (response) {
                console.log(response);
                $("#office-tab").show(500);
                $(".office_name").text(response.name);
                $(".office_currency").text(response.currency);
                $(".office_timezone").text(response.timezone);
                $(".office_public_hoilday").text(response.calendar.name);
                $(".office_street").text(response.street);
                $(".office_zip_city").text(response.zip+', '+response.city);
                $(".office_state_country").text(response.state+', '+response.country);
            }
        });
    });
});



  </script>
@endsection