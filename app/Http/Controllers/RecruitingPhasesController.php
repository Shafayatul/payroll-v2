<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\RecruitingPhase;
use Illuminate\Http\Request;

class RecruitingPhasesController extends Controller
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
            $recruitingphases = RecruitingPhase::where('name', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('max_days_in_phase', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $recruitingphases = RecruitingPhase::latest()->paginate($perPage);
        }

        return view('recruiting-phases.index', compact('recruitingphases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recruiting-phases.create');
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
        
        RecruitingPhase::create($requestData);

        return redirect('recruiting-phases')->with('success', 'RecruitingPhase added!');
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
        $recruitingphase = RecruitingPhase::findOrFail($id);

        return view('recruiting-phases.show', compact('recruitingphase'));
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
        $recruitingphase = RecruitingPhase::findOrFail($id);

        return view('recruiting-phases.edit', compact('recruitingphase'));
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
        
        $recruitingphase = RecruitingPhase::findOrFail($id);
        $recruitingphase->update($requestData);

        return redirect('recruiting-phases')->with('success', 'RecruitingPhase updated!');
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
        RecruitingPhase::destroy($id);

        return redirect('recruiting-phases')->with('success', 'RecruitingPhase deleted!');
    }
}
