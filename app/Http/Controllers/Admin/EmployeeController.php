<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\EmployeeDetailAttribute;
use App\EmployeeDetail;
use App\User;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Auth::user()->office->company;
        $employees = User::whereHas('office', function($u) use($company) {
            $u->where('company_id', $company->id);
        })->get();


        $sections = $company->employeeInformationSections;
        $attributes = EmployeeDetailAttribute::whereHas('employeeInformationSection', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();
        return view('employees.index', compact('employees', 'attributes', 'sections'));
    }

    public function employeesAttendance(){
        $company = Auth::user()->office->company;
        $employees = User::whereHas('office', function($u) use($company) {
            $u->where('company_id', $company->id);
        })->get();


        $sections = $company->employeeInformationSections;
        $attributes = EmployeeDetailAttribute::whereHas('employeeInformationSection', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();
        return view('employees.employee-attendance', compact('employees', 'attributes', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->salary = $request->salary;
        $user->status = true;
        $user->password = Hash::make($request->password);
        $user->office_id = $request->office;
        $user->department_id = $request->department;
        $user->save();

        if($request->value){
            foreach($request->value as $attribute => $value){
                if($value != null){
                    $detail = EmployeeDetail::where('attribute_id', $attribute)->where('user_id', Auth::id())->first();
                    if(null == $detail)
                    $detail = new EmployeeDetail();
                    /* 'value', 'user_id', 'attribute_id' */
                    $detail->attribute_id = $attribute;
                    $detail->user_id = Auth::id();
                    $detail->value = $value;
                    $detail->save();
                }
            }
        }
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
