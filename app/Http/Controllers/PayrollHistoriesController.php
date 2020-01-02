<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PayrollHistory;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PayrollHistoriesController extends Controller
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
            $payrollhistories = PayrollHistory::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payrollhistories = PayrollHistory::latest()->paginate($perPage);
        }
        $users = User::pluck('name', 'id');
        return view('payroll-histories.index', compact('payrollhistories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('payroll-histories.create');
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
        
        $payrollhistory              = new PayrollHistory;
        $payrollhistory->amount      = $request->amount;
        $payrollhistory->date        = $request->date;
        $payrollhistory->description = $request->description;
        $payrollhistory->user_id     = Auth::id();
        $payrollhistory->save();

        return redirect('payroll-histories')->with('success', 'PayrollHistory added!');
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
        $payrollhistory = PayrollHistory::findOrFail($id);
        $users = User::pluck('name', 'id');
        return view('payroll-histories.show', compact('payrollhistory', 'users'));
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
        $payrollhistory = PayrollHistory::findOrFail($id);
        $users = User::pluck('name', 'id');
        return view('payroll-histories.edit', compact('payrollhistory', 'users'));
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
        $payrollhistory = PayrollHistory::findOrFail($id);
        $payrollhistory->amount      = $request->amount;
        $payrollhistory->date        = $request->date;
        $payrollhistory->description = $request->description;
        $payrollhistory->user_id     = $payrollhistory->user_id;
        $payrollhistory->save();

        return redirect('payroll-histories')->with('success', 'PayrollHistory updated!');
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
        PayrollHistory::destroy($id);

        return redirect('payroll-histories')->with('success', 'PayrollHistory deleted!');
    }
}
