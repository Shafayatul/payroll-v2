<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FeedbackCategory;
use App\Office;
use Illuminate\Http\Request;

class FeedbackCategoriesController extends Controller
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
            $feedbackcategories = FeedbackCategory::where('name', 'LIKE', "%$keyword%")
                ->orWhere('office_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $feedbackcategories = FeedbackCategory::latest()->paginate($perPage);
        }
        $offices = Office::pluck('name', 'id');
        return view('feedback-categories.index', compact('feedbackcategories', 'offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::pluck('name', 'id');
        return view('feedback-categories.create', compact('offices'));
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
        
        FeedbackCategory::create($requestData);

        return redirect('feedback-categories')->with('success', 'FeedbackCategory added!');
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
        $feedbackcategory = FeedbackCategory::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('feedback-categories.show', compact('feedbackcategory', 'offices'));
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
        $feedbackcategory = FeedbackCategory::findOrFail($id);
        $offices = Office::pluck('name', 'id');
        return view('feedback-categories.edit', compact('feedbackcategory', 'offices'));
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
        
        $feedbackcategory = FeedbackCategory::findOrFail($id);
        $feedbackcategory->update($requestData);

        return redirect('feedback-categories')->with('success', 'FeedbackCategory updated!');
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
        FeedbackCategory::destroy($id);

        return redirect('feedback-categories')->with('success', 'FeedbackCategory deleted!');
    }
}
