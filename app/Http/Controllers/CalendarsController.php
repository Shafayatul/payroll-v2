<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;
use App\Calendar;
use Auth;

class CalendarsController extends Controller
{
    public function index()
    {

        $absences = Auth::user()->office->absences;
        $is_checked = Auth::user()->office->absenceCalendars()->pluck('absence_id');
        return view('calendars.index', compact('absences', 'is_checked'));
    }

    public function update(Request $request)
    {
        Auth::user()->office->absenceCalendars()->delete();
        if($request->is_checked){
            foreach ($request->is_checked as $key => $value) {
                $calendar             = new Calendar;
                $calendar->absence_id = $key;
                $calendar->is_checked = $value;
                $calendar->office_id  = Auth::user()->office_id;
                $calendar->save();
            }
        }
        
        return redirect()->route('calendars.index')->with('success', 'Calendar Added Successful!');
    }
}
