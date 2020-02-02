<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayrollSetting;
use App\EmployeeDetailAttribute;
use App\Absence;
use Auth;

class PayrollGeneralSettingsController extends Controller
{
    public function index()
    {
    	$absences = Auth::user()->office->absences;
    	$payrollSetting = Auth::user()->office->payrollSettings;
    	// dd($payrollSetting->absences);

    	$employeeInfoSections = Auth::user()->company->employeeInformationSections;
    	return view('payroll.index', compact('payrollSetting', 'absences', 'employeeInfoSections'));
    }

    public function update(Request $request, $id)
    {
        if($request->is_separate == 1){
            $is_separate = 1;
        }else{
            $is_separate = 0;
        }
        $payrollSetting = PayrollSetting::findOrFail($id);
        $payrollSetting->review_reminder_on = $request->review_reminder_on;
        $payrollSetting->is_separate = $is_separate;
        $payrollSetting->prorate_salary_calculation = $request->prorate_salary_calculation;
        $payrollSetting->prorate_salary_calculation = $request->prorate_salary_calculation;
        $payrollSetting->office_id = Auth::user()->office_id;
        $payrollSetting->save();

        foreach($request->select_attribute_id as $key => $id){
            $payrollSetting->attributes()->sync($id);
        }

        foreach($request->select_absence_id as $key => $id){
            $payrollSetting->absences()->sync($id);
        }

        return redirect()->route('payroll.general')->with('success', 'Payroll Setting update');
    }
}
