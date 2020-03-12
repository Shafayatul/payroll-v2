<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\PublicHolidayCalendar;
use App\CalendarYear;
use App\Holiday;
use App\Office;

class PublicHolidayCalendarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $system_holiday_calendars = PublicHolidayCalendar::where('type', 0)->latest()->get();
        $custom_holiday_calendars = Auth::user()->office->company->publicHolidays()->where('type', 1)->latest()->get();
        // dd($custom_holiday_calendars);
        $holiday_calendars = PublicHolidayCalendar::latest()->get();
        return view('public-holiday-calendars.index', compact('holiday_calendars', 'system_holiday_calendars', 'custom_holiday_calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::pluck('name', 'id');
        return view('public-holiday-calendars.create', compact('offices'));
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
        if(Auth::user()->office->company->user_id == Auth::id()){
            $type = 0;
        } else 
            $type = 1;

        $calendar = PublicHolidayCalendar::create([
            'name'       => $request->name,
            'type'       => 1,
            'company_id' => Auth::user()->office->company_id
        ]);

        $calendar_year = new CalendarYear();
        $calendar_year->year = Carbon::today()->format('Y');
        $calendar_year->calendar_id = $calendar->id;
        $calendar_year->save();

        return redirect('public-holiday-calendars')->with('success', 'Public holiday calendar added!');
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
        $publicholidaycalendar = PublicHolidayCalendar::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        $holidays = Holiday::where('public_holiday_calendar_id', $id)->latest()->get();
        return view('public-holiday-calendars.show', compact('publicholidaycalendar', 'offices', 'holidays'));
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
        $publicholidaycalendar = PublicHolidayCalendar::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('public-holiday-calendars.edit', compact('publicholidaycalendar', 'offices'));
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
        
        $calendar = PublicHolidayCalendar::findOrFail($id);
        $calendar->name = $request->name;
        $calendar->save();

        return redirect('public-holiday-calendars')->with('success', 'Public holiday calendar updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PublicHolidayCalendar::destroy($id);

        return redirect('public-holiday-calendars')->with('success', 'Public holiday calendar deleted!');
    }
}
