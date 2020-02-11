<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\AttributeTypeOptions;
use App\EmployeeDetailAttribute;
use App\EmployeeAttributeDatatype;
use App\EmployeeInformationSection;

class CustomFieldController extends Controller
{
    public function index(){
        $sections = Auth::user()->office->company->employeeInformationSections;
        // dd($sections);
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

    public function sectionUpdateName(Request $request){
        $section = EmployeeInformationSection::findOrFail($request->section);

        $section->name = $request->name;
        $section->save();

        return redirect()->back();
    }

    public function attributeStore(Request $request){
        $request->validate([
            'attribute' => 'bail|required',
            'attr_type' => 'bail|required',
        ]);
            
        if($request->attr_type && ($request->attr_type == 1 || $request->attr_type == 7)){
            $request->validate([
                'option' => 'required',
            ]);
        } elseif ($request->attr_type == 3){
            $request->validate([
                'decimal_number' => 'required',
            ]);
        }
                    
        if($request->attribute){
            $attribute = new EmployeeDetailAttribute();
            $attribute->name = $request->attribute;
            if(isset($request->is_unique) && $request->is_unique == 1){
                $attribute->is_unique = true; 
            } else {
                $attribute->is_unique = false;
            }
            $attribute->section_id = $request->section;
            $attribute->is_system = false;
            $attribute->save();
            
            if ($request->attr_type){
                $attr_type = $request->attr_type;
                $data_types = new EmployeeAttributeDatatype();
                $data_types->name = $attribute->attributeTypes()[$attr_type];
                $data_types->key = $attr_type;
                $data_types->attribute_id = $attribute->id;
                $data_types->save();

                if ($attr_type == 1 || $attr_type == 7){
                    foreach ($request->option as $key => $value) {
                        $option = new AttributeTypeOptions();
                        $option->name = $value;
                        $option->attribute_datatype_id = $data_types->id;
                        $option->save();
                    }
                } elseif ($attr_type == 3){
                    $option = new AttributeTypeOptions();
                    $option->name = $request->decimal_number;
                    $option->attribute_datatype_id = $data_types->id;
                    $option->save();
                }
            }
        }
        return redirect()->back();
    }

    public function attributeUpdate(Request $request){
        $request->validate([
            'attribute' => 'bail|required',
            'attr_type' => 'bail|required',
            'attribute_id' => 'bail|required',
        ]);

        if($request->attr_type && ($request->attr_type == 1 || $request->attr_type == 7)){
            $request->validate([
                'option' => 'required_without:old_option',

            ]);
        } elseif ($request->attr_type == 3){
            $request->validate([
                'decimal_number' => 'required',
            ]);
        }
        
        if($request->attribute){
            $attribute = EmployeeDetailAttribute::findOrFail($request->attribute_id);
            $attribute->name = $request->attribute;
            if(null !== $request->is_unique && $request->is_unique == 1){
                $attribute->is_unique = true; 
            } else {
                $attribute->is_unique = false;
            }
            $attribute->is_system = false; 
            $attribute->save();
            
            if (null !== $request->attr_type){
                $attr_type = $request->attr_type;
                
                $data_types = $attribute->dataTypes;
                if(!$data_types){
                    $data_types = new EmployeeAttributeDatatype();
                    $data_types->attribute_id = $attribute->id;
                }
                $data_types->name = $attribute->attributeTypes()[$attr_type];
                $data_types->key = $attr_type;
                $data_types->attribute_id = $attribute->id;
                $data_types->save();

                
                if ($attr_type == 1 || $attr_type == 7){
                    if(null !== $request->old_option){
                        if(null !== $attribute->dataTypes->attributeOptions){
                            $attribute->dataTypes->attributeOptions()->whereNotIn('id', array_keys($request->old_option))->delete();
                        }
                        foreach ($request->old_option as $key => $value) {
                            $option = AttributeTypeOptions::findOrFail($key);
                            $option->name = $value;
                            $option->save();
                        }    
                    }
                    if(null !== $request->option){
                        foreach ($request->option as $key => $value) {
                            $option = new AttributeTypeOptions();
                            $option->name = $value;
                            $option->attribute_datatype_id = $data_types->id;
                            $option->save();
                        }
                    }
                } elseif ($attr_type == 3){
                    if(null !== $attribute->dataTypes->attributeOptions){
                        $attribute->dataTypes->attributeOptions()->delete();
                    }
                    $option = new AttributeTypeOptions();
                    $option->name = $request->decimal_number;
                    $option->attribute_datatype_id = $data_types->id;
                    $option->save();
                } else {
                    if($attribute->dataTypes->attributeOptions){
                        $attribute->dataTypes->attributeOptions()->delete();
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function sectionDestroy(Request $request){
        $section = EmployeeInformationSection::findOrFail($request->section_id);
        $section->delete();
        return redirect()->back();
    }

    public function attributeDestroy(Request $request){
        $attribute = EmployeeDetailAttribute::findOrFail($request->attribute_id);
        $attribute->delete();
        return redirect()->back();
    }
}
