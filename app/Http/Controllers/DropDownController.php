<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Thana;
use App\Models\Area;

class DropDownController extends Controller
{
       public function index()
	{
		$districts = District::orderBy('name', 'asc')->get();
		return view('welcome',compact('districts'));
	}
    function GetThana($id){
        $thanas = Thana::where('district_id', $id)->get();

        return response()->json($thanas);
    }

    function GetArea($area_id){
        $areas = Area::where('thana_id', $area_id)->get();

        return response()->json($areas);
    }
}
