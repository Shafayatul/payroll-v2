<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;

class CalendarsController extends Controller
{
    public function index()
    {
        $absences = Absence::latest()->get();
        return view('calendars.index', compact('absences'));
    }
}
