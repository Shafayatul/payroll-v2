<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Office;

class AjaxController extends Controller
{
    
    public function getAjaxOfficeData($id){
        $office = Office::findOrFail($id);
        $office->calendar;
        $office->company;
        return response()->json($office);
    }
}
