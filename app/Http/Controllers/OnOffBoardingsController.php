<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardingTemplate;
use App\BoardingStep;
use Auth;
use App\Traits\keyFunctiontrait;

class OnOffBoardingsController extends Controller
{
    use keyFunctiontrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $on_boarding_templates = BoardingTemplate::where('type', 1)->get();
        $off_boarding_templates = BoardingTemplate::where('type', 0)->get();
        $boardingStepType = $this->boardingStepType();
        $boardingStepItems = $this->boardingStepItems();
        $on_boarding_steps = BoardingStep::where('boarding_type', 1)->get();
        $off_boarding_steps = BoardingStep::where('boarding_type', 0)->get();
        return view('on-off-boardings.index', compact('on_boarding_templates', 'off_boarding_templates', 'boardingStepType', 'boardingStepItems', 'on_boarding_steps', 'off_boarding_steps'));
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
    public function boardingTemplatestore(Request $request)
    {
        $data = $request->all();
        BoardingTemplate::create($data + ['company_id' => Auth::user()->company->id, 'office_id' => Auth::user()->office_id]);
        return redirect()->route('on-off-boardings.index')->with('success', 'Template Created!');
    }

    public function boardingStepstore(Request $request)
    {
        $data = $request->all();
        BoardingStep::create($data);
        return redirect()->route('on-off-boardings.index')->with('success', 'Step Created!');
    }

    public function boardingStepItemstore(Request $request)
    {

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
    public function update(Request $request, $id)
    {
        //
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
