<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OvertimeCompensation;
use App\Absence;
use App\Contribution;
use App\Mutuality;
use Auth;

class AbsensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Auth::user()->office->absences;
        $absence = new Absence();
        $valid_datas = $absence->validOnData();
        $types = $absence->carryoverType();
        return view('absences.index', compact('absences', 'valid_datas', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $absence            = new Absence;
        $absence->name      = $request->name;
        $absence->color     = $absence->defaultColor();
        $absence->valid_on  = 'Work Schedule on Mon-Fri';
        $absence->office_id = Auth::user()->office_id;
        $absence->save();
        return redirect('absenses')->with('success', 'Absence Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->certificate_required == 1){
            $certificate_required = $request->required_days;
        }else{
            $certificate_required = 0;
        }
        $absence                                   = Absence::findOrFail($id);
        $absence->name                             = $request->name;
        $absence->color                            = $request->color;
        $absence->is_halfday_request               = $request->is_halfday_request;
        $absence->certificate_required             = $certificate_required;
        $absence->is_substituting                  = $request->is_substituting;
        $absence->is_employee_substituting_absence = $request->is_employee_substituting_absence;
        $absence->valid_on                         = $request->valid_on;
        $absence->is_absence_period_as_overtime    = $request->is_absence_period_as_overtime;
        $absence->is_accrual_policies              = $request->is_accrual_policies;
        $absence->carryover_type                   = $request->carryover_type;
        $absence->carryover_date                   = $request->carryover_date;
        $absence->office_id                        = Auth::user()->office_id;
        $absence->save();
        return redirect('absenses')->with('success', 'Absence Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }

    public function overtimeIndex(){
        $company = Auth::user()->office->company;
        $compensations = OvertimeCompensation::whereHas('offices', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();

        return view('compensation.index', compact('compensations', 'company'));
    }

    public function overtimeStore(Request $request){
        $compensatory = OvertimeCompensation::where('type', $request->type)->where('office_id', $request->office)->first();
        if(!$compensatory)
        $compensatory = new OvertimeCompensation();

        $compensatory->type = $request->type;
        $compensatory->increase = $request->increase;
        $compensatory->office_id = $request->office;
        $compensatory->save();

        return redirect()->back();
    }

    public function mutualityIndex(){
        $company = Auth::user()->office->company;
        $mutualities = Mutuality::whereHas('offices', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();

        return view('mutuality.index', compact('mutualities', 'company'));
    }

    public function mutualityStore(Request $request){
        $mutuality = new Mutuality();

        $mutuality->name        = $request->name;
        $mutuality->description = 'Contribution';
        $mutuality->rate        = $request->rate;
        $mutuality->office_id   = $request->office;
        $mutuality->save();

        return redirect()->back();
    }

    public function mutualityUpdate(Request $request){
        $mutuality = Mutuality::findOrFail($request->id);

        $mutuality->name        = $request->name;
        $mutuality->description = 'Contribution';
        $mutuality->rate        = $request->rate;
        $mutuality->office_id   = $request->office;
        $mutuality->save();

        return redirect()->back();
    }

    public function contributionIndex(){
        $company = Auth::user()->office->company;
        $contributions = Contribution::whereHas('offices', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();

        return view('contribution.index', compact('contributions', 'company'));
    }

    public function contributionStore(Request $request){
        $contribution = new Contribution();

        $contribution->name        = $request->name;
        $contribution->description = 'Contribution';
        $contribution->rate        = $request->rate;
        $contribution->office_id   = $request->office;
        $contribution->save();

        return redirect()->back();
    }

    public function contributionUpdate(Request $request){
        $contribution = Contribution::findOrFail($request->id);

        $contribution->name        = $request->name;
        $contribution->description = 'Contribution';
        $contribution->rate        = $request->rate;
        $contribution->office_id   = $request->office;
        $contribution->save();

        return redirect()->back();
    }
}