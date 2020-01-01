<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PublicHolidayCalendar;
use App\Office;
use Illuminate\Http\Request;

class PublicHolidayCalendarsController extends Controller
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
            $publicholidaycalendars = PublicHolidayCalendar::where('name', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('office_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $publicholidaycalendars = PublicHolidayCalendar::latest()->paginate($perPage);
        }
        $offices = Office::pluck('name', 'id');
        return view('public-holiday-calendars.index', compact('publicholidaycalendars', 'offices'));
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
        
        $requestData = $request->all();
        
        PublicHolidayCalendar::create($requestData);

        return redirect('public-holiday-calendars')->with('success', 'PublicHolidayCalendar added!');
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
        return view('public-holiday-calendars.show', compact('publicholidaycalendar', 'offices'));
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
        
        $requestData = $request->all();
        
        $publicholidaycalendar = PublicHolidayCalendar::findOrFail($id);
        $publicholidaycalendar->update($requestData);

        return redirect('public-holiday-calendars')->with('success', 'PublicHolidayCalendar updated!');
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

        return redirect('public-holiday-calendars')->with('success', 'PublicHolidayCalendar deleted!');
    }
}
