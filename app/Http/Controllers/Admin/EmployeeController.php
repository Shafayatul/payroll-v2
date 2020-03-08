<?php

namespace App\Http\Controllers\Admin;

use App\Absence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\EmployeeDetailAttribute;
use App\CalendarHoliday;
use App\EmployeeDetail;
use App\UserAbsence;
use App\Attendance;
use App\Weekday;
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

    public function employeesAbsence(){
        $company = Auth::user()->office->company;
        $employees = User::whereHas('office', function($u) use($company) {
            $u->where('company_id', $company->id);
        })->get();
        $absences = Absence::whereHas('offices', function($u) use($company) {
            $u->where('company_id', $company->id);
        })->get();
        return view('employees.employee-absence', compact('employees', 'absences'));
    }

    public function setAttendance(Request $request){
        $in_time = Carbon::createFromFormat('H:i', $request->time_in);
        $out_time = Carbon::createFromFormat('H:i', $request->time_out);
        // $employee = User::findOrFail($request->employee);
        // $today = Carbon::today()->format('Y-m-d');
        $today = $request->date;
        // $year = Carbon::today()->format('Y');
        // $holiday = CalendarHoliday::where('date', $today)->whereHas('calendarYears', function($q) use($employee,$year){
        //     $q->where('year', $year)->whereHas('calendars', function($p) use($employee){
        //         $p->where('company_id', $employee->office->company_id);
        //     });
        // })->first();
        $day_name = Carbon::today()->format('l');

        $weekday = Weekday::where('weekday', $day_name)->first();

        $attendance = Attendance::where('date', $today)->first();
        if(!$attendance){
            $attendance = new Attendance();
        }
        $attendance->in_time = $in_time->format('Y-m-d H:s');
        $attendance->out_time = $out_time->format('Y-m-d H:s');
        $attendance->date = $today;
        $attendance->user_id = $request->employee;
        $attendance->weekday_id = $weekday->id;
        $attendance->save();
        
        return redirect()->back();
    }

    public function setAbsence(Request $request){
        $absence_from = Carbon::createFromFormat('m-d-Y h:i A', $request->absence_from);
        $absence_to = Carbon::createFromFormat('m-d-Y h:i A', $request->absence_to);
        // $employee = User::findOrFail($request->employee);
        
        $absence = new UserAbsence();
        $absence->absence_from = Carbon::parse($absence_from);
        $absence->absence_to = Carbon::parse($absence_to);
        $absence->reason = $request->reason;
        $absence->user_id = $request->employee;
        $absence->absence_id = $request->absence;
        $absence->save();

        // $absence->absence_to = $absence_from->format('Y-m-d ');
        
        return redirect()->back();
    }

    public function getAbsence($id){
        $employee = User::findOrFail($id);
        $absences = $employee->userAbsences()->orderBy('pivot_absence_from', 'DESC')->get()->groupBy(function($q){
            return Carbon::parse($q->pivot->absence_from)->format('F Y');
        });
        return response()->json([
            'absences' => $absences,
        ]);
    }

    public function getAttendance($id){
        $employee = User::findOrFail($id);
        $attendance = $employee->userAttendances()->orderBy('pivot_date', 'DESC')->get()->groupBy(function($q){
            return Carbon::parse($q->pivot->date)->format('F Y');
        });
        return response()->json([
            'attendance' => $attendance,
        ]);
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
