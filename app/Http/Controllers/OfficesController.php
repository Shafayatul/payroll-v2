<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Office;
use App\Company;
use App\PublicHolidayCalendar;
use Illuminate\Http\Request;
use App\Traits\timezoneCurrencyTrait;
use Auth;

class OfficesController extends Controller
{
    use timezoneCurrencyTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $offices = Office::where('company_id', $company->id)->get();
            
        $public_holiday_calendars = PublicHolidayCalendar::where('company_id', $company->id)->pluck('name', 'id');
        $json_currencies = $this->currencies();
        $currencies = json_decode($json_currencies);
        $timezones = $this->timezones();
        return view('offices.index', compact('offices', 'currencies', 'timezones', 'public_holiday_calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('offices.create');
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
        $company = Company::where('user_id', Auth::id())->first();

        $office                             = new Office();
        $office->name                       = $request->name;
        $office->currency                   = $company->currency;
        $office->timezone                   = $company->timezone;
        $office->street                     = $request->street;
        $office->house                      = $request->house;
        $office->street_additional          = $request->street_additional;
        $office->zip                        = $request->zip;
        $office->city                       = $request->city;
        $office->state                      = $request->state;
        $office->country                    = $request->country;
        $office->public_holiday_calendar_id = $company->public_holiday_calendar_id;
        $office->company_id                 = $company->id;
        $office->save();

        return redirect('offices')->with('success', 'Office added!');
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
        $office    = Office::findOrFail($id);
        $countries = $this->countries();
        $companies = Company::pluck('name', 'id');
        $holidays = PublicHolidayCalendar::pluck('name', 'id');
        return view('offices.show', compact('office', 'countries', 'companies', 'holidays'));
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
        $office = Office::findOrFail($id);
        $json_currencies = $this->currencies();
        $currencies = json_decode($json_currencies);
        $timezones = $this->timezones();
        $countries = $this->countries();
        $companies = Company::pluck('name', 'id');
        $holidays = PublicHolidayCalendar::pluck('name', 'id');
        return view('offices.edit', compact('office', 'currencies', 'timezones', 'countries', 'companies', 'holidays'));
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
        // dd($request->all());
        
        $office                             = Office::findOrFail($id);
        $office->name                       = $request->name;
        $office->currency                   = $request->currency;
        $office->timezone                   = $request->timezone;
        $office->street                     = $request->street;
        $office->house                      = $request->house;
        $office->street_additional          = $request->street_additional;
        $office->zip                        = $request->zip;
        $office->city                       = $request->city;
        $office->state                      = $request->state;
        $office->country                    = $request->country;
        $office->public_holiday_calendar_id = $request->public_holiday_calendar_id;
        $office->save();

        return redirect('offices')->with('success', 'Office updated!');
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
        // Office::destroy($id);

        // return redirect('offices')->with('success', 'Office deleted!');
        return redirect()->back();
    }
}
