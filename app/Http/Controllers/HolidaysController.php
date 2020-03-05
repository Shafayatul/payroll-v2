<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CalendarHoliday;
use App\CalendarYear;
use App\PublicHolidayCalendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $holidays = Holiday::where('name', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->orWhere('is_halfday', 'LIKE', "%$keyword%")
                ->orWhere('public_holiday_calendar_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $holidays = Holiday::latest()->paginate($perPage);
        }
        $public_holiday_calendars = PublicHolidayCalendar::pluck('name', 'id');
        return view('holidays.index', compact('holidays', 'public_holiday_calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $public_holiday_calendars = PublicHolidayCalendar::pluck('name', 'id');
        return view('holidays.create', compact('public_holiday_calendars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if($request->is_halfday != null){
            $is_halfday = 1;
        }else{
            $is_halfday = 0;
        }
        
        if($request->type != 0){
            $details = $request->details;
            if($request->type == 1 || $request->type == 2){
                $date = Carbon::parse($request->date)->format('Y-m-d');
                $year = Carbon::parse($request->date)->format('Y');
                $calendar_year = CalendarYear::where('calendar_id', $request->public_holiday_calendar_id)->where('year', $year)->first();
                if($calendar_year == null){
                    $calendar_year = new CalendarYear();
                    $calendar_year->year = Carbon::parse($request->date)->format('Y');
                    $calendar_year->calendar_id = $request->public_holiday_calendar_id;
                    $calendar_year->save();
                }
            }elseif($request->type == 3){
                $calendar_year = CalendarYear::where('year', $request->year)->first();
                $details = $request->weekday_number." ".$request->weekday." ".$request->month." ".$calendar_year->year;
                $date = Carbon::parse($details);
                $date = $date->format('Y-m-d');
            }
            $holiday                   = new CalendarHoliday();
            $holiday->name             = $request->name;
            $holiday->date             = $date;
            $holiday->details          = $details;
            $holiday->is_halfday       = $is_halfday;
            $holiday->calendar_year_id = $calendar_year->id;
            $holiday->save();
        }else{
            $calendar_year = CalendarYear::where('year', $request->year)->first();
            $exist_holiday = CalendarHoliday::findOrFail($request->exist_holiday);
            $holiday = $exist_holiday->replicate();
            // $holiday->is_halfday = $is_halfday;
            $holiday->calendar_year_id = $calendar_year->id;
            $holiday->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $holiday = Holiday::findOrFail($id);
        $public_holiday_calendars = PublicHolidayCalendar::pluck('name', 'id');
        return view('holidays.show', compact('holiday', 'public_holiday_calendars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        $public_holiday_calendars = PublicHolidayCalendar::pluck('name', 'id');
        return view('holidays.edit', compact('holiday', 'public_holiday_calendars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if($request->is_halfday != null){
            $is_halfday = 1;
        }else{
            $is_halfday = null;
        }

        $holiday                             = Holiday::findOrFail($id);
        $holiday->name                       = $request->name;
        $holiday->details                    = $request->details;
        $holiday->is_halfday                 = $is_halfday;
        $holiday->public_holiday_calendar_id = $request->public_holiday_calendar_id;
        $holiday->save();
        return redirect('/public-holiday-calendars/'.$holiday->public_holiday_calendar_id)->with('success', 'Holiday updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {   $holiday = Holiday::findOrFail($id);
        Holiday::destroy($id);

        return redirect('/public-holiday-calendars/'.$holiday->public_holiday_calendar_id)->with('success', 'Holiday deleted!');
    }
}
