<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FeedbackCategoryAttribute;
use App\FeedbackCategory;
use Illuminate\Http\Request;

class FeedbackCategoryAttributesController extends Controller
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
            $feedbackcategoryattributes = FeedbackCategoryAttribute::where('name', 'LIKE', "%$keyword%")
                ->orWhere('is_required', 'LIKE', "%$keyword%")
                ->orWhere('feedback_category_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $feedbackcategoryattributes = FeedbackCategoryAttribute::latest()->paginate($perPage);
        }
        $feedback_categories = FeedbackCategory::pluck('name', 'id');
        return view('feedback-category-attributes.index', compact('feedbackcategoryattributes', 'feedback_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $feedback_categories = FeedbackCategory::pluck('name', 'id');
        return view('feedback-category-attributes.create', compact('feedback_categories'));
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
        if($request->is_required == null){
            $is_required = 0;
        }else{
            $is_required = 1;
        }
        
        $feedbackcategoryattribute                       = new FeedbackCategoryAttribute;
        $feedbackcategoryattribute->name                 = $request->name;
        $feedbackcategoryattribute->is_required          = $is_required;
        $feedbackcategoryattribute->feedback_category_id = $request->feedback_category_id;
        $feedbackcategoryattribute->save();

        return redirect('/feedback-categories/'.$request->feedback_category_id)->with('success', 'FeedbackCategoryAttribute added!');
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
        $feedbackcategoryattribute = FeedbackCategoryAttribute::findOrFail($id);
        $feedback_categories = FeedbackCategory::pluck('name', 'id');
        return view('feedback-category-attributes.show', compact('feedbackcategoryattribute', 'feedback_categories'));
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
        $feedbackcategoryattribute = FeedbackCategoryAttribute::findOrFail($id);
        $feedback_categories = FeedbackCategory::pluck('name', 'id');
        return view('feedback-category-attributes.edit', compact('feedbackcategoryattribute', 'feedback_categories'));
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
        if($request->is_required == null){
            $is_required = 0;
        }else{
            $is_required = 1;
        }
        
        $feedbackcategoryattribute                       = FeedbackCategoryAttribute::findOrFail($id);
        $feedbackcategoryattribute->name                 = $request->name;
        $feedbackcategoryattribute->is_required          = $is_required;
        $feedbackcategoryattribute->feedback_category_id = $request->feedback_category_id;
        $feedbackcategoryattribute->save();
        
        return redirect('/feedback-categories/'.$request->feedback_category_id)->with('success', 'FeedbackCategoryAttribute updated!');
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
        $feedbackcategoryattribute = FeedbackCategoryAttribute::findOrFail($id);
        FeedbackCategoryAttribute::destroy($id);

        return redirect('/feedback-categories/'.$feedbackcategoryattribute->feedback_category_id)->with('success', 'FeedbackCategoryAttribute deleted!');
    }
}
