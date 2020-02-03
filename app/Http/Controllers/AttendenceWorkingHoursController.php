<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AttendenceWorkingHour;
use App\Office;
use App\Weekday;
use Illuminate\Http\Request;
use Auth;

class AttendenceWorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $attendenceworkinghours = Auth::user()->office->attendenceWorkingHours;
        // dd($attendenceworkinghours);
        return view('attendence-working-hours.index', compact('attendenceworkinghours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::pluck('name', 'id');
        return view('attendence-working-hours.create', compact('offices'));
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
        
        $attendenceworkinghour                       = new AttendenceWorkingHour;
        $attendenceworkinghour->name                 = $request->name;
        $attendenceworkinghour->office_id            = Auth::user()->office_id;
        $attendenceworkinghour->is_track_overtime    = 0;
        $attendenceworkinghour->overtime_calculation = "weekly";
        $attendenceworkinghour->overtime_cliff       = "0";
        $attendenceworkinghour->is_deficit           = 0;
        $attendenceworkinghour->is_prorate_vacation  = 1;
        $attendenceworkinghour->reference_value      = "5";
        $attendenceworkinghour->save();

        if($attendenceworkinghour){
            foreach($attendenceworkinghour->days() as $day){
                $weekday                  = new Weekday;
                $weekday->weekday         = $day;
                $weekday->working_hour_id = $attendenceworkinghour->id;
                if(($day == 'Saturday') || ($day == 'Sunday')){
                    $weekday->working_hours   = "Closed";
                }else{
                    $weekday->working_hours   = "8:00";
                }
                $weekday->start_time      = null;
                $weekday->end_time        = null;
                $weekday->is_active       = 1;
                $weekday->save();
            }
        }

        return redirect('attendence-working-hours')->with('success', 'AttendenceWorkingHour added!');
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
        $attendenceworkinghour = AttendenceWorkingHour::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('attendence-working-hours.show', compact('attendenceworkinghour', 'offices'));
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
        $attendenceworkinghour = AttendenceWorkingHour::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('attendence-working-hours.edit', compact('attendenceworkinghour', 'offices'));
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
        
        $attendenceworkinghour = AttendenceWorkingHour::findOrFail($id);
        $attendenceworkinghour->update($requestData);

        return redirect('attendence-working-hours')->with('success', 'AttendenceWorkingHour updated!');
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
        return redirect('attendence-working-hours');
    }
}
