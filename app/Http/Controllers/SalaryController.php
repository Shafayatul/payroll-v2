<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\EmployeeDetailAttribute;
use App\CalendarHoliday;
use App\CalendarYear;
use App\Attendance;
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

        $employee = User::query()->findOrFail(10);
        $this_month = Carbon::parse('March 2020')->firstOfMonth()->format('Y-m-d');
        $next_month = Carbon::parse('March 2020')->endOfMonth()->format('Y-m-d');

        $attendances = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->orderBy('pivot_date', 'DESC')->get()
        /* ->groupBy(function($q){
            return Carbon::parse($q->pivot->date)->format('F Y');
        }) */;
        // $hour = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->select('user_attendance.date')->get();
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
                
        // dd($test, $hour, $today);
        // ->select(DB::raw("SUM(time_to_sec(timediff('pivot_out_time', 'pivot_in_time')) / 3600) as result"))->first();
        // ->select(DB::raw('user_attendance.out_time'), DB::raw('user_attendance.in_time'))->get();
        /* ->groupBy(function($q){
            return Carbon::parse($q->pivot->date)->format('F Y');
        }) */;

        // dd(Attendance::select(DB::raw("SUM(time_to_sec(timediff(user_attendance.out_time, user_attendance.in_time)) / 3600) as result"))->first('result'));

        $test = DB::table('user_attendance')->where('user_id', $employee->id)->whereBetween('date', [$this_month, $next_month])
        ->select(DB::raw("SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as result"))->first('result');
        
        // $hello = DB::raw('TIMESTAMPDIFF(minute, startDateTime, endDateTime) as duration');

        // dd($hour, $test);
        // dd($office, $employee, $attendances);
        // dd('hello');
        return view('salary.salary', compact('attributes', 'employees'));
    }

    public function salaryInfo($id){
        $employee = User::query()->findOrFail($id);
        
        // dd(\Carbon\Carbon::today());
        // $attendances = $employee->userAttendances()->whereBetween('user_attendance.date', [$this_month, $next_month])->orderBy('pivot_date', 'DESC')->get()
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
        foreach($days as $day){
            $weekday = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('l');
            $date = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y-m-d');
            $year = Carbon::createFromFormat('Y-m-d', $day->pivot->date)->format('Y');
            
            $finishTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->out_time);
            $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $day->pivot->in_time);

            // $calendar = CalendarYear::where('calendar_id', $employee->office->public_holiday_calendar_id)->where('year', $year)->first();
            $calendar = CalendarHoliday::where('date', $day->pivot->date);
            // dd($calendar);
            if($calendar == null){
                if($weekday == 'Sunday'){
                    $time = $finishTime->diffInSeconds($startTime);
                    $sunday += $time;
                }
            } else {
                $time = $finishTime->diffInSeconds($startTime);
                $holiday += $time;
            }
        }
        dd($calendar, $holiday, $sunday);
        // $working_hour = $total_time_count->total_time - $total_time_count->break_time;
            // $overtime = 0;
            // if($working_hour > 173)
            // $overtime = $working_hour - 173;
            // dump($total_time_count, $working_hour, $overtime);
        }
        // dd($total_time_count->total_time - $total_time_count->break_time);
        // dd($months);
        return view('salary.salary-info', compact('employee', 'months'));
    }
}
    