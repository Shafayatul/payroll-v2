<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CostCenter;
use App\Office;
use Illuminate\Http\Request;
use Auth;

class CostCentersController extends Controller
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
            $costcenters = CostCenter::where('name', 'LIKE', "%$keyword%")
                ->orWhere('office_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $costcenters = CostCenter::latest()->paginate($perPage);
        }
        $offices = Office::pluck('name', 'id');
        return view('cost-centers.index', compact('costcenters', 'offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cost-centers.create', compact('offices'));
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
        $costcenter            = new CostCenter;
        $costcenter->name      = $request->name;
        $costcenter->office_id = Auth::user()->office_id;
        $costcenter->save();

        return redirect('cost-centers')->with('success', 'CostCenter added!');
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
        $costcenter = CostCenter::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('cost-centers.show', compact('costcenter', 'offices'));
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
        $costcenter = CostCenter::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('cost-centers.edit', compact('costcenter', 'offices'));
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
        $costcenter            = CostCenter::findOrFail($id);
        $costcenter->name      = $request->name;
        $costcenter->office_id = Auth::user()->office_id;
        $costcenter->save();

        return redirect('cost-centers')->with('success', 'CostCenter updated!');
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
        CostCenter::destroy($id);

        return redirect('cost-centers')->with('success', 'CostCenter deleted!');
    }
}
