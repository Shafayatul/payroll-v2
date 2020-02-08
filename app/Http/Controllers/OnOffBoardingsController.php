<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardingTemplate;
use App\BoardingStep;
use App\BoardingStepItem;
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
        $documentCategories = $this->documentCategory();
        $highringType = $this->boardingTemplateStepHighringType();
        $on_boarding_steps = BoardingStep::where('boarding_type', 1)->get();
        $off_boarding_steps = BoardingStep::where('boarding_type', 0)->get();
        return view('on-off-boardings.index', compact('on_boarding_templates', 'off_boarding_templates', 'boardingStepType', 'boardingStepItems', 'on_boarding_steps', 'off_boarding_steps', 'highringType', 'documentCategories'));
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

    public function boardingTemplateStepStore(Request $request)
    {
        $boarding_template = BoardingTemplate::findOrFail($request->boarding_template_id);
        $boarding_template->boardingTemplateStep()->attach($request->boarding_step_id, [
            'is_ingroup' => false,
            'days' => $request->days,
            'responsible' => $request->responsible,
            'hire_type' => $request->hire_type
        ]);

        return redirect()->route('on-off-boardings.index')->with('success', 'Add Step to Template!');
    }

    public function boardingTemplateStepUpdate(Request $request)
    {
        // dd($request->all());
        $boarding_template = BoardingTemplate::findOrFail($request->boarding_template_id);
        foreach($request->boarding_step_id as $key => $value){
            // print_r($value);
            $boarding_template->boardingTemplateStep()->updateExistingPivot($value, [
                'is_ingroup' => false,
                'days' => $request->days[$key],
                'responsible' => $request->responsible[$key],
                'hire_type' => $request->hire_type[$key]
            ]);
        }
        

        return redirect()->route('on-off-boardings.index')->with('success', 'Update Step to Template!');
    }

    public function boardingStepItemstore(Request $request)
    {
        $boarding_step_item = new BoardingStepItem;
        $boarding_step_item->type_key = $request->type_key;
        $boarding_step_item->type_name = $this->boardingStepItems()[$request->type_key];
        $boarding_step_item->type_icon = $request->type_key;
        $boarding_step_item->boarding_step_id = $request->boarding_step_id;
        $boarding_step_item->save();

        return redirect()->route('on-off-boardings.index')->with('success', 'Add Step Item!');

    }

    public function boardingStepItemUpdate(Request $request)
    {

        foreach($request->value as $id => $value){
            $boarding_step_item = BoardingStepItem::findOrFail($id);
            $boarding_step_item->value = $value;
            if(isset($request->is_required[$id])){
                $boarding_step_item->is_required = $request->is_required[$id];
            }else{
                $boarding_step_item->is_required = false;
            }
            
            $boarding_step_item->save();
        }

        return redirect()->route('on-off-boardings.index')->with('success', 'Update Step Item!');
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
