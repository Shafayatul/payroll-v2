<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\RecurringCompensationType;
use Illuminate\Http\Request;
use Auth;

class RecurringCompensationTypesController extends Controller
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

        $recurringcompensationtypes = RecurringCompensationType::latest()->paginate($perPage);

        return view('recurring-compensation-types.index', compact('recurringcompensationtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recurring-compensation-types.create');
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
        if($request->is_system_type != null){
            $is_system_type = 1;
        }else{
            $is_system_type = 0;
        }
        $recurringcompensationtype                 = new RecurringCompensationType;
        $recurringcompensationtype->name           = $request->name;
        $recurringcompensationtype->is_system_type = $is_system_type;
        $recurringcompensationtype->office_id     = Auth::user()->office->id;
        $recurringcompensationtype->save();

        return redirect('recurring-compensation-types')->with('success', 'RecurringCompensationType added!');
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
        $recurringcompensationtype = RecurringCompensationType::findOrFail($id);

        return view('recurring-compensation-types.show', compact('recurringcompensationtype'));
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
        $recurringcompensationtype = RecurringCompensationType::findOrFail($id);

        return view('recurring-compensation-types.edit', compact('recurringcompensationtype'));
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
        $recurringcompensationtype                 = RecurringCompensationType::findOrFail($id);
        $recurringcompensationtype->name           = $request->name;
        $recurringcompensationtype->office_id     = Auth::user()->office->id;
        $recurringcompensationtype->save();

        return redirect('recurring-compensation-types')->with('success', 'RecurringCompensationType updated!');
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
        RecurringCompensationType::destroy($id);

        return redirect('recurring-compensation-types');
    }
}
