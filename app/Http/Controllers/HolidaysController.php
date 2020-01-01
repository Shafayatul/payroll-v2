<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Holiday;
use App\PublicHolidayCalendar;
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
            $is_halfday = null;
        }

        $holiday                             = new Holiday;
        $holiday->name                       = $request->name;
        $holiday->details                    = $request->details;
        $holiday->is_halfday                 = $is_halfday;
        $holiday->public_holiday_calendar_id = $request->public_holiday_calendar_id;
        $holiday->save();
        return redirect('holidays')->with('success', 'Holiday added!');
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
        return redirect('holidays')->with('success', 'Holiday updated!');
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
        Holiday::destroy($id);

        return redirect('holidays')->with('success', 'Holiday deleted!');
    }
}
