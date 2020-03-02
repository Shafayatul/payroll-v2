<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use File;
use Auth;
use Illuminate\Support\Facades\Storage;

use App\Office;
use App\Company;
use App\Industry;
use App\PublicHolidayCalendar;

use App\Traits\timezoneCurrencyTrait;

class CompaniesController extends Controller
{
  use timezoneCurrencyTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $company = Company::where('user_id', Auth::id())->first();
        $json_currencies = $this->currencies();
        $currencies = json_decode($json_currencies);
        $timezones = $this->timezones();
        $industries = Industry::pluck('name', 'id');
        $public_holiday_calendars = PublicHolidayCalendar::where('company_id', $company->id)->pluck('name', 'id');
        return view('companies.index', compact('company', 'industries', 'public_holiday_calendars', 'currencies', 'timezones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     $json_currencies = $this->currencies();
    //     $currencies = json_decode($json_currencies);
    //     $timezones = $this->timezones();
    //     $industries = Industry::pluck('name', 'id');
    //     $public_holiday_calendars = PublicHolidayCalendar::where('company_id', $company->id)->pluck('name', 'id');
    //     return view('companies.create', compact('currencies', 'timezones', 'industries', 'public_holiday_calendars'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if($request->is_sub_company_enable != null){
            $is_sub_company_enable = 1;
        }else{
            $is_sub_company_enable = 0;
        }

        if($request->is_email_notification_enable != null){
            $is_email_notification_enable = 1;
        }else{
            $is_email_notification_enable = 0;
        }

        if($request->hasFile('logo')){
            $logo     = $request->file('logo');
            $name     = uniqid().'.'.strtolower($logo->getClientOriginalExtension());
            $path     = 'company-logo/';
            $logo_url = $path.$name;
            $logo->move($path, $name);
        }else{
            $logo_url = null;
        }

        $company                               = new Company;
        $company->name                         = $request->name;
        $company->is_sub_company_enable        = $is_sub_company_enable;
        $company->is_email_notification_enable = $is_email_notification_enable;
        $company->language                     = $request->language;
        $company->currency                     = $request->currency;
        $company->industry_id                  = $request->industry_id;
        $company->timezone                     = $request->timezone;
        $company->public_holiday_calendar_id   = $request->public_holiday_calendar_id;
        $company->maintenance_emails           = implode(',',$request->maintenance_emails);
        $company->logo                         = $logo_url;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added!');
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
        $company = Company::findOrFail($id);
        $json_currencies = $this->currencies();
        $currencies = json_decode($json_currencies);
        $timezones = $this->timezones();
        $industries = Industry::pluck('name', 'id');
        $public_holiday_calendars = PublicHolidayCalendar::where('company_id', $company->id)->pluck('name', 'id');
        return view('companies.show', compact('company', 'currencies', 'timezones', 'industries', 'public_holiday_calendars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    // public function edit($id)
    // {
    //     $company = Company::findOrFail($id);
    //     $public_holiday_calendars = PublicHolidayCalendar::where('company_id', $company->id)->pluck('name', 'id');
    //     $json_currencies = $this->currencies();
    //     $currencies = json_decode($json_currencies);
    //     $timezones = $this->timezones();
    //     $industries = Industry::pluck('name', 'id');
    //     return view('companies.edit', compact('company', 'currencies', 'timezones', 'industries', 'public_holiday_calendars'));
    // }

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
        $company = Company::findOrFail($id);
        if($request->is_sub_company_enable != null){
            $is_sub_company_enable = 1;
        }else{
            $is_sub_company_enable = 0;
        }

        if($request->is_email_notification_enable != null){
            $is_email_notification_enable = 1;
        }else{
            $is_email_notification_enable = 0;
        }

        if($request->hasFile('logo')){
            $logo       = $request->file('logo');
            $name       = uniqid().'.'.strtolower($logo->getClientOriginalExtension());
            $logo->storeAs('public/company-logo', $name);
            $result = Storage::disk('public')->exists('company-logo/'.$name);
            if(($result == true) && ($company->logo != null)){
                Storage::disk('public')->delete('company-logo/'.$company->logo);
            }
        }else{
            $name = $company->logo;
        }

        $company->name                         = $request->name;
        $company->is_sub_company_enable        = $is_sub_company_enable;
        $company->is_email_notification_enable = $is_email_notification_enable;
        $company->language                     = $request->language;
        $company->currency                     = $request->currency;
        $company->industry_id                  = $request->industry_id;
        $company->timezone                     = $request->timezone;
        $company->public_holiday_calendar_id   = $request->public_holiday_calendar_id;
        $company->contact_for_maintenance      = implode(',',$request->contact_for_maintenance);
        $company->logo                         = $name;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated!');
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
        // $company =Company::findOrFail($id);
        // $result = Storage::disk('public')->exists('company-logo/'.$company->logo);
        // if(($result == true) && ($company->logo != null)){
        //     Storage::disk('public')->delete('company-logo/'.$company->logo);
        // }
        // Company::destroy($id);

        // return redirect('companies')->with('success', 'Company deleted!');
        return redirect()->back();
    }
}
