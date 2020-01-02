<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PayrollGroup;
use App\Company;
use Illuminate\Http\Request;

class PayrollGroupsController extends Controller
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
            $payrollgroups = PayrollGroup::where('company_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('val_id', 'LIKE', "%$keyword%")
                ->orWhere('start', 'LIKE', "%$keyword%")
                ->orWhere('end', 'LIKE', "%$keyword%")
                ->orWhere('start_from', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payrollgroups = PayrollGroup::latest()->paginate($perPage);
        }
        $companies = Company::pluck('name', 'id');
        return view('payroll-groups.index', compact('payrollgroups', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('payroll-groups.create', compact('companies'));
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
        
        PayrollGroup::create($requestData);

        return redirect('payroll-groups')->with('success', 'PayrollGroup added!');
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
        $payrollgroup = PayrollGroup::findOrFail($id);
        $companies = Company::pluck('name', 'id');
        return view('payroll-groups.show', compact('payrollgroup', 'companies'));
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
        $payrollgroup = PayrollGroup::findOrFail($id);
        $companies = Company::pluck('name', 'id');
        return view('payroll-groups.edit', compact('payrollgroup', 'companies'));
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
        
        $payrollgroup = PayrollGroup::findOrFail($id);
        $payrollgroup->update($requestData);

        return redirect('payroll-groups')->with('success', 'PayrollGroup updated!');
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
        PayrollGroup::destroy($id);

        return redirect('payroll-groups')->with('success', 'PayrollGroup deleted!');
    }
}
