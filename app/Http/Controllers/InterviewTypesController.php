<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\InterviewType;
use Illuminate\Http\Request;

class InterviewTypesController extends Controller
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
            $interviewtypes = InterviewType::where('name', 'LIKE', "%$keyword%")
                ->orWhere('sort_order', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $interviewtypes = InterviewType::latest()->paginate($perPage);
        }

        return view('interview-types.index', compact('interviewtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('interview-types.create');
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
        
        InterviewType::create($requestData);

        return redirect('interview-types')->with('success', 'InterviewType added!');
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
        $interviewtype = InterviewType::findOrFail($id);

        return view('interview-types.show', compact('interviewtype'));
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
        $interviewtype = InterviewType::findOrFail($id);

        return view('interview-types.edit', compact('interviewtype'));
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
        
        $interviewtype = InterviewType::findOrFail($id);
        $interviewtype->update($requestData);

        return redirect('interview-types')->with('success', 'InterviewType updated!');
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
        InterviewType::destroy($id);

        return redirect('interview-types')->with('success', 'InterviewType deleted!');
    }
}
