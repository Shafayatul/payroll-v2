<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\EmployeeDetailAttribute;
use App\EmployeeAttributeDatatype;
use App\EmployeeInformationSection;

class CustomFieldController extends Controller
{
    public function index(){
        $sections = Auth::user()->office->company->employeeInformationSections;
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

    public function updateName(Request $request){
        $section = EmployeeInformationSection::findOrFail($request->section);

        $section->name = $request->name;
        $section->save();

        return redirect()->back();
    }

    public function attributeStore(Request $request){
        // if($request->attribute){
            $attribute = new EmployeeDetailAttribute();
            dd($attribute->attributeTypes()[$request->attr_type]);
            $attribute->name = $request->attribute;
            if(isset($request->is_unique) && $request->is_unique == 1){
                $attribute->is_unique = true; 
            } else {
                $attribute->is_unique = false;
            }
            $attribute->is_system = false; 
            $attribute->section_id = $request->section_id;
            $attribute->save();

            $data_types = new EmployeeAttributeDatatype();
            /* 'name', 'key', 'attribute_id' */
            
            $data_types->name = $attribute->attributeTypes()[$request->attr_type];
            $data_types->key = $request->attr_type;
            $data_types->attribute_id = $attribute->id;
            $data_types->save();

        // }

        return redirect()->back();
    }
}
