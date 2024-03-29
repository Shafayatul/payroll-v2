<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Department;
use App\Office;
use Illuminate\Http\Request;
use Auth;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $company_id = Auth::user()->office->company_id;
        $departments = Department::whereHas('office', function($q) use($company_id) {
            $q->where('company_id', $company_id);
        })->latest()->get();
        $offices = Office::pluck('name', 'id');
        return view('departments.index', compact('departments', 'offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::pluck('name', 'id');
        return view('departments.create', compact('offices'));
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
        $department               = new Department;
        $department->name         = $request->name;
        $department->working_hour = $department->workingHours();
        $department->office_id    = Auth::user()->office_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department added!');
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
        $department = Department::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('departments.show', compact('department', 'offices'));
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
        $department = Department::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('departments.edit', compact('department', 'offices'));
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
        $department               = Department::findOrFail($id);
        $department->name         = $request->name;
        $department->working_hour = $request->working_hour;
        $department->save();

        return redirect('departments')->with('success', 'Department updated!');
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
        // Department::destroy($id);

        // return redirect('departments')->with('success', 'Department deleted!');
        return redirect()->back();
    }
}
