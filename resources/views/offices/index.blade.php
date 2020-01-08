@extends('layouts.admin.master')
@section('title', 'Offices')
@section('admin-additional-css')
<link href="{{ asset('admin/css/app-contact.css') }}" id="app-contact" rel="stylesheet" media="all">
<link href="{{ asset('admin/css/office.css') }}"  rel="stylesheet" media="all">
@endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Offices</a></li>
            <li class="breadcrumb-item active">Offices</li>
        </ol>
    </div>
</div>
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
                @foreach($offices as $item)
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#office-tab" role="tab">
                           {{ $item->name }}
                            <span class="badge pull-right" data-toggle="tooltip" title="" data-original-title="7 active employees, 9 total">
                                7
                            </span>
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-8 tab-content">
        <div class="block-section tab-pane active" id="office-tab" role="tabpanel">
            <h4 class="sub-header">
                ddd 
                <small> 
                    <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible1();">
                        (Edit)
                    </a> 
                </small> 
                <a href="#modal-delete-office" data-toggle="modal"> 
                    <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office">
                        
                    </i> 
                </a>
            </h4>
             <div class="form-horizontal form-striped compact" id="office-div1">
                <div class="form-group row"><label class="col-md-3 control-label"> Office name </label>
                    <div class="col-md-5"> <p class="form-control-static">ddd</p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Currency </label>
                    <div class="col-md-5">
                        <p class="form-control-static">EUR (€)</p>
                        <i>(Company default)</i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5 form-control-static"> Europe/Berlin<br> <i>(Company default)</i> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Street </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> ZIP, City </label>
                    <div class="col-md-5"><p class="form-control-static">Abbey Road 112 </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> State, Country </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112 </p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Public holidays </label>
                    <div class="col-md-5">
                        <p class="form-control-static"> DE Feiertage <i>(from company)</i> </p>
                    </div>
                </div>
            </div>
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office1" novalidate="novalidate">
                <input name="_token" type="hidden" value="">
                <input name="update_office_id" type="hidden" value="198659">
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="ddd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Currency
                    </label>
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
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5">
                         <select class="select-chosen form-control"  >
                       <option value="null">Same as company</option>                        
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
                   
                    </select>
                        
                       </div>
                 </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Street
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="Street" name="street" type="text">
                    </div>
                    <div class="col-md-1">
                        <input class="form-control" placeholder="House number" name="house_number" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 col-md-offset-3">
                        <input class="form-control" placeholder="Additional address information" name="street_additional" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        ZIP, City
                    </label>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="ZIP code" name="zip_code" type="text">
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" placeholder="City" name="city" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        State, Country
                    </label>
                    <div class="col-md-2">
                        <input class="form-control state-text" placeholder="State" name="state" type="text">
                        
                    </div>
                    <div class="col-md-3">
                         <select class="select-chosen form-control">
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
                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible1();"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div> 
        <div class="tab-pane  p-3" id="profile3" role="tabpanel">
           <h4 class="sub-header">ddd <small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible2();">(Edit)</a> </small> <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a>
            </h4>
             <div class="form-horizontal form-striped compact" id="office-div2">
                <div class="form-group row"><label class="col-md-3 control-label"> Office name </label>
                    <div class="col-md-5"> <p class="form-control-static">ddd</p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Currency </label>
                    <div class="col-md-5">
                        <p class="form-control-static">EUR (€)</p>
                        <i>(Company default)</i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5 form-control-static"> Europe/Berlin<br> <i>(Company default)</i> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Street </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> ZIP, City </label>
                    <div class="col-md-5"><p class="form-control-static">Abbey Road 112 </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> State, Country </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112 </p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Public holidays </label>
                    <div class="col-md-5">
                        <p class="form-control-static"> DE Feiertage <i>(from company)</i> </p>
                    </div>
                </div>
            </div>
             <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office2" novalidate="novalidate">
                <input name="_token" type="hidden" value="">
                <input name="update_office_id" type="hidden" value="198659">
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="ddd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Currency
                    </label>
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
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5">
                         <select class="select-chosen form-control"  >
                       <option value="null">Same as company</option>                        
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
                   
                    </select>
                        
                       </div>
                 </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Street
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="Street" name="street" type="text">
                    </div>
                    <div class="col-md-1">
                        <input class="form-control" placeholder="House number" name="house_number" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 col-md-offset-3">
                        <input class="form-control" placeholder="Additional address information" name="street_additional" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        ZIP, City
                    </label>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="ZIP code" name="zip_code" type="text">
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" placeholder="City" name="city" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        State, Country
                    </label>
                    <div class="col-md-2">
                        <input class="form-control state-text" placeholder="State" name="state" type="text">
                        
                    </div>
                    <div class="col-md-3">
                         <select class="select-chosen form-control">
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
                        <button type="reset" class="btn btn-default edit-cancel" onclick="switchVisible2();"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Submit</button>
                    </div>
                </div>
            </form>
            

        </div>
        <div class="tab-pane p-3" id="messages3" role="tabpanel">
              <h4 class="sub-header">ddd <small> <a href="#" class="edit-toggle" data-toggle="tooltip" data-original-title="" title="" onclick="switchVisible();">(Edit)</a> </small> <a href="#modal-delete-office" data-toggle="modal"> <i class="fas fa-trash pull-right" data-toggle="tooltip" title="" data-original-title="Delete this office"></i> </a>
            </h4>
            <div class="form-horizontal form-striped compact" id="office-div">
                <div class="form-group row"><label class="col-md-3 control-label">Office name </label>
                    <div class="col-md-5"> <p class="form-control-static">ddd</p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Currency </label>
                    <div class="col-md-5">
                        <p class="form-control-static">EUR (€)</p>
                        <i>(Company default)</i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5 form-control-static"> Europe/Berlin<br> <i>(Company default)</i> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Street </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> ZIP, City </label>
                    <div class="col-md-5"><p class="form-control-static">Abbey Road 112 </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> State, Country </label>
                    <div class="col-md-5"> <p class="form-control-static">Abbey Road 112 </p> </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label"> Public holidays </label>
                    <div class="col-md-5">
                        <p class="form-control-static"> DE Feiertage <i>(from company)</i> </p>
                    </div>
                </div>
            </div>
            
            <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" id="office" novalidate="novalidate">
                <input name="_token" type="hidden" value="">
                <input name="update_office_id" type="hidden" value="198659">
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Office name
                    </label>
                    <div class="col-md-5">
                        <input class="form-control" placeholder="Office name" required="" minlength="2" name="name" type="text" value="ddd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Currency
                    </label>
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
                    <label class="col-md-3 control-label"> Timezone </label>
                    <div class="col-md-5">
                         <select class="select-chosen form-control"  >
                       <option value="null">Same as company</option>                        
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
                   
                    </select>
                        
                       </div>
                 </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Street
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="Street" name="street" type="text">
                    </div>
                    <div class="col-md-1">
                        <input class="form-control" placeholder="House number" name="house_number" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 col-md-offset-3">
                        <input class="form-control" placeholder="Additional address information" name="street_additional" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        ZIP, City
                    </label>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="ZIP code" name="zip_code" type="text">
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" placeholder="City" name="city" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        State, Country
                    </label>
                    <div class="col-md-2">
                        <input class="form-control state-text" placeholder="State" name="state" type="text">
                        
                    </div>
                    <div class="col-md-3">
                         <select class="select-chosen form-control">
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
            </form>
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
if (document.getElementById('office-div')) {

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

$(document).ready(function() {
    $('.select-chosen').select2();
});


  </script>
@endsection