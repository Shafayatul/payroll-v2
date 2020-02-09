<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentCategory;
use Auth;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->office->documentCategories;
        return view('setting.documents.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function documentCategoryStore(Request $request)
    {
        $documentCategory             = new DocumentCategory;
        $documentCategory->name       = $request->name;
        $documentCategory->sort_order = 0;
        $documentCategory->office_id  = Auth::user()->office_id;
        $documentCategory->save();

        return redirect()->route('setting.document')->with('success', 'Document category Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documentCategoryUpdate(Request $request)
    {
        $documentCategory             = DocumentCategory::findOrFail($request->document_category_id);
        $documentCategory->name       = $request->name;
        $documentCategory->sort_order = $request->sort_order;
        $documentCategory->save();

        return redirect()->route('setting.document')->with('success', 'Document Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
