<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AttendenceWorkingHour;
use App\Office;
use Illuminate\Http\Request;

class AttendenceWorkingHoursController extends Controller
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
            $attendenceworkinghours = AttendenceWorkingHour::where('office_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('is_track_overtime', 'LIKE', "%$keyword%")
                ->orWhere('overtime_calculation', 'LIKE', "%$keyword%")
                ->orWhere('overtime_cliff', 'LIKE', "%$keyword%")
                ->orWhere('deficit_hours', 'LIKE', "%$keyword%")
                ->orWhere(', is_prorate_vacation', 'LIKE', "%$keyword%")
                ->orWhere('reference_value', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $attendenceworkinghours = AttendenceWorkingHour::latest()->paginate($perPage);
        }
        $offices = Office::pluck('name', 'id');
        return view('attendence-working-hours.index', compact('attendenceworkinghours', 'offices'));
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
        
        $requestData = $request->all();
        
        AttendenceWorkingHour::create($requestData);

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
        AttendenceWorkingHour::destroy($id);

        return redirect('attendence-working-hours')->with('success', 'AttendenceWorkingHour deleted!');
    }
}
