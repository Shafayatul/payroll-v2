<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use App\EmployeeDetailAttribute;
use App\CalendarHoliday;
use App\Compensation;
use App\Contribution;
use App\CalendarYear;
use App\Attendance;
use App\Salary;
use App\User;

class SalaryController extends Controller
{
    public function index(){
        $office = Auth::user()->office;
        $company = Auth::user()->company;
        $employees = User::where('office_id', $office->id)->get();

        $attributes = EmployeeDetailAttribute::whereHas('employeeInformationSection', function($q) use($company) {
            $q->where('company_id', $company->id);
        })->get();

        // $employee = User::query()->findOrFail(10);
        $this_month = Carbon::parse('March 2020')->firstOfMonth()->format('Y-m-d');
        $next_month = Carbon::parse('March 2020')->endOfMonth()->format('Y-m-d');

        $today = Carbon::today()->format('H:i');
        $test = DB::table('users')
                ->join('user_attendance AS at', 'at.user_id', 'users.id')
                ->join('weekdays AS wd', 'wd.id', 'at.weekday_id')
                ->whereBetween('at.date', [$this_month, $next_month])
                ->where('users.id',10)
                ->get();
        $hour = DB::table('users')
                ->join('user_attendance AS at', 'at.user_id', 'users.id')
                ->join('weekdays AS wd', 'wd.id', 'at.weekday_id')
                ->whereBetween('at.date', [$this_month, $next_month])
                ->where('users.id',10)
                ->select(
                    DB::raw("SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as total_time"),
                    DB::raw("SUM(time_to_sec(timediff(break_time, '00:00')) / 3600) as break_time"),
                    DB::raw("SUM(time_to_sec(timediff(end_time, start_time)) / 3600) as work_time"),
                    // DB::raw("TIME_FORMAT(SEC_TO_TIME(SUM(time_to_sec(timediff(break_time, '00:00')))),'%I') as break")
                )->first('total_time', 'break_time', 'work_time');

        return view('salary.salary', compact('attributes', 'employees'));
    }

  
    public function salaryInfo($id){
        $employee = User::query()->findOrFail($id);
        // $attendances = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->orderBy('pivot_date', 'DESC')->get()
        $attendances = $employee->userAttendances()->orderBy('pivot_date', 'DESC')->get()
        ->groupBy(function($q){
            return Carbon::parse($q->pivot->date)->format('F Y');
        });
        $months = [];
        $loop = 1;
        foreach($attendances as $key => $attendance){
            $this_month = Carbon::parse($key)->firstOfMonth()->format('Y-m-d');
            $next_month = Carbon::parse($key)->endOfMonth()->format('Y-m-d');            $total_time_count = DB::table('users')
                ->join('user_attendance AS at', 'at.user_id', 'users.id')
                ->join('weekdays AS wd', 'wd.id', 'at.weekday_id')
                ->whereBetween('at.date', [$this_month, $next_month])
                ->where('users.id',$id)
                ->select(
                    DB::raw("SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as total_time"),
                    DB::raw("SUM(time_to_sec(timediff(break_time, '00:00')) / 3600) as break_time"),
                    DB::raw("SUM(time_to_sec(timediff(end_time, start_time)) / 3600) as work_time"),
                    DB::raw("COUNT(at.id) as count"),
                )->first('total_time', 'break_time', 'work_time', 'count');
            
            $months[$key] = $total_time_count;
            $days = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->orderBy('pivot_date', 'DESC')->get();
            $sunday = 0;
            $holiday = 0;
            foreach($days as $day){
                $weekday = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('l');
                $date = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y-m-d');
                $year = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y');
                
                $finishTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->out_time);
                $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->in_time);
                
                $breaktime = 0;
                if($day->break_time != null){
                    $break = Carbon::createFromFormat('H:i', $day->break_time);
                    $breaktime = $break->diffInSeconds(Carbon::today());
                }
                
                // $calendar = CalendarYear::where('calendar_id', $employee->office->public_holiday_calendar_id)->where('year', $year)->first();
                $calendar = CalendarHoliday::where('date', $day->pivot->date)->first();
                if($calendar == null){
                    if($weekday == 'Sunday'){
                        $time = $finishTime->diffInSeconds($startTime);
                        $time -= $breaktime;
                        $sunday += $time;
                    }
                } else {
                    $time = $finishTime->diffInSeconds($startTime);
                    $time -= $breaktime;
                    $holiday += $time;
                }
            }
            $months[$key]->sunday = $sunday / 3600;
            $months[$key]->holiday = $holiday / 3600;
        }
        return view('salary.salary-info', compact('employee', 'months'));
    }

    public function info($id){
        $employee = User::query()->findOrFail($id);
        
        $attendances = $employee->userAttendances()->orderBy('pivot_date', 'DESC')->get()
        ->groupBy(function($q){
            return Carbon::parse($q->pivot->date)->format('F Y');
        });
        $months = [];
        $loop = 1;
        foreach($attendances as $key => $attendance){
            $this_month = Carbon::parse($key)->firstOfMonth()->format('Y-m-d');
            $next_month = Carbon::parse($key)->endOfMonth()->format('Y-m-d');
            
            $total_time_count = DB::table('users')
                ->join('user_attendance AS at', 'at.user_id', 'users.id')
                ->join('weekdays AS wd', 'wd.id', 'at.weekday_id')
                ->whereBetween('at.date', [$this_month, $next_month])
                ->where('users.id',$id)
                ->select(
                    DB::raw("SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as total_time"),
                    DB::raw("SUM(time_to_sec(timediff(break_time, '00:00')) / 3600) as break_time"),
                    DB::raw("SUM(time_to_sec(timediff(end_time, start_time)) / 3600) as work_time"),
                    DB::raw("COUNT(at.id) as count"),
                )->first('total_time', 'break_time', 'work_time', 'count');
            
            $months[$key] = $total_time_count;
            $days = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->orderBy('pivot_date', 'DESC')->get();
            $sunday = 0;
            $holiday = 0;
            $other = 0;
            foreach($days as $day){
                $weekday = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('l');
                $date = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y-m-d');
                $year = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y');
                
                $finishTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->out_time);
                $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->in_time);
                
                $breaktime = 0;
                if($day->break_time != null){
                    $break = Carbon::createFromFormat('H:i', $day->break_time);
                    $breaktime = $break->diffInSeconds(Carbon::today());
                }
                
                $calendar = CalendarHoliday::where('date', $day->pivot->date)->first();
                if($calendar == null){
                    if($weekday == 'Sunday'){
                        $time = $finishTime->diffInSeconds($startTime);
                        $time -= $breaktime;
                        $sunday += $time;
                    }
                } else {
                    $time = $finishTime->diffInSeconds($startTime);
                    $time -= $breaktime;
                    $holiday += $time;
                }
            }

            $months[$key]->sunday = $sunday / 3600;
            $months[$key]->holiday = $holiday / 3600;
            $months[$key]->other = $other / 3600;
        }
        return view('salary.salary-info', compact('employee', 'months'));
    }

    public function payment(Request $request){
        $id = $request->id;
        $month_year = $request->month_year;

        $employee = User::query()->findOrFail($id);
        
        $month = Carbon::createFromFormat('F-Y', $month_year);
        $startofmonth = $month->firstOfMonth()->format('Y-m-d');
        $endofmonth = $month->endOfMonth()->format('Y-m-d');
        $total_time_count = DB::table('users')
            ->join('user_attendance AS at', 'at.user_id', 'users.id')
            ->join('weekdays AS wd', 'wd.id', 'at.weekday_id')
            ->whereBetween('at.date', [$startofmonth, $endofmonth])
            ->where('users.id',$id)
            ->select(
                DB::raw("SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as total_time"),
                DB::raw("SUM(time_to_sec(timediff(break_time, '00:00')) / 3600) as break_time"),
                DB::raw("SUM(time_to_sec(timediff(end_time, start_time)) / 3600) as work_time"),
                DB::raw("COUNT(at.id) as count"),
            )->first('total_time', 'break_time', 'work_time', 'count');
        
        $days = $employee->userAttendances()->whereBetween('user_attendance.date', [$startofmonth, $endofmonth])->orderBy('pivot_date', 'DESC')->get();
        $sunday = 0;
        $holiday = 0;
        $other = 0;
        foreach($days as $day){
            $weekday = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('l');
            $date = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y-m-d');
            $year = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y');
            
            $finishTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->out_time);
            $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->in_time);
            
            $breaktime = 0;
            if($day->break_time != null){
                $break = Carbon::createFromFormat('H:i', $day->break_time);
                $breaktime = $break->diffInSeconds(Carbon::today());
            }
            
            $calendar = CalendarHoliday::where('date', $day->pivot->date)->first();
            if($calendar == null){
                if($weekday == 'Sunday'){
                    $time = $finishTime->diffInSeconds($startTime);
                    $time -= $breaktime;
                    $sunday += $time;
                }
            } else {
                $time = $finishTime->diffInSeconds($startTime);
                $time -= $breaktime;
                $holiday += $time;
            }
        }

        $salary_info = new Salary();
        $salary_info->get_salary_month = $month_year;
        $salary_info->date = Carbon::now()->format('Y-m-d H:i:s');
        $salary_info->user_id = $employee->id;
        $salary_info->office_id = $employee->office->id;
        $salary_info->save();

        $sunday = $sunday / 3600;
        $holiday = $holiday / 3600;
        $other = $other / 3600;
        $salary = $employee->salary;
        $office_work_time = (($total_time_count->work_time - $total_time_count->break_time) * 60);
        $work_time = (($total_time_count->total_time - $total_time_count->break_time) * 60);
        $overtime = ($work_time - ( 173 * 60 ) > 0 ? $work_time - ( 173 * 60 ) : 00);
        $h = 0;
        if($employee->employee_type == 1){
            $h = $employee->salary/86.5;
        } else {
            $h = $employee->salary/173;
        }
        $compensatory = 0;
        $contribute = 0;
        foreach ($request->compensation as $compensation){
            $compensation = Compensation::find($compensation);
            if($compensation){
                /* number_format($contribute, 2, '.','') */
                if($compensation->type == 0){
                    $amount = ($sunday*$h)*($compensation->increase/100);
                    $salary_info->compensations()->attach($compensation->id, array('amount' => number_format($amount, 2, '.','')));
                    $compensatory += $amount;
                } elseif($compensation->type == 1){
                    $amount = ($holiday*$h)*($compensation->increase/100);
                    $salary_info->compensations()->attach($compensation->id, array('amount' => number_format($amount, 2, '.','')));
                    $compensatory += $amount;
                } else {
                    $amount = ((($overtime/60) - ($holiday + $sunday))*$h)*($compensation->increase/100);
                    $salary_info->compensations()->attach($compensation->id, array('amount' => number_format($amount, 2, '.','')));
                    $compensatory += $amount;
                }
            }
        }
        foreach ($request->contribution as $contribution){
            $contribution = Contribution::find($contribution);
            if($contribution){
                $amount = ($salary*$contribution['rate'])/100;
                $salary_info->contributions()->attach($contribution->id, array('amount' => number_format($amount, 2, '.','')));
                $contribute += $amount;
            }
        }
        $total = ($salary + $compensatory) - $contribute;
        $salary_info->total = number_format($total, 2, '.','');
        $salary_info->is_paid = true;
        $salary_info->save();
        return redirect()->back();
    }
}
    