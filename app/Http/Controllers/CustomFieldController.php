<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\EmployeeDetailAttribute;
use App\EmployeeInformationSection;

class CustomFieldController extends Controller
{
    public function index(){
        $sections = EmployeeInformationSection::all();
        return view('setting.employee-information.employee-information', compact('sections'));
    }

    public function sectionStore(Request $request){
        if($request->section){
            $section = new EmployeeInformationSection();
            $section->name = $request->section;
            $section->type = 0;
            $section->company_id = Auth::user()->office->company_id;
            $section->save();
        }
        return redirect()->back();
    }

    public function attributeStore(Request $request){
        if($request->attribute){
            $attribute = new EmployeeDetailAttribute();
            $attribute->name = $request->attribute;
            $attribute->is_unique = $request->is_unique; 
            $attribute->is_system = $request->is_system; 
            $attribute->section_id = $request->section_id;
            $attribute->save();
        }
        return redirect()->back();
    }
}
