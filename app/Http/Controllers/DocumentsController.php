<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentCategory;
use App\DocumentTemplate;
use App\Traits\keyFunctionTrait;
use Illuminate\Support\Facades\Storage;
use Auth;

class DocumentsController extends Controller
{
    use keyFunctionTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->office->documentCategories;
        $langs = $this->templateLang();
        return view('setting.documents.index', compact('categories', 'langs')); 
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

    public function documentTemplateUpload(Request $request)
    {
        $request->validate([
            'category_id'   => 'required',
            'name'          => 'required',
            'lang'          => 'required',
            'template_file' => 'required',
        ]);
        $file = $request->file('template_file');
        $file_name = uniqid().'.'.strtolower($file->getClientOriginalExtension());
        $path = Storage::disk('public')->putFileAs(
            'document-templates', $file, $file_name
        );
        
        $document_template                = new DocumentTemplate;
        $document_template->category_id   = $request->category_id;
        $document_template->name          = $request->name;
        $document_template->lang          = $request->category_id;
        $document_template->template_file = $path;
        $document_template->save();

        return redirect()->route('setting.document')->with('success', 'Template Added!');
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
