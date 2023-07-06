<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function index()
    {
        //query all visits using Visit model
        $visits = Visit::all();

        //return in JSON format
        return response()->json([
            'success' => true,
            'message' => 'List of all visits',
            'data' => $visits
        ]);
    }

    public function store(Request $request)
    {
        //store data - POPO
        $visit = new Visit();
        $visit ->visitor_name = $request->visitor_name;
        $visit ->purpose = $request->purpose;
        $visit ->temparature = $request->temparature;
        $visit->save();

        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'Visit saved',
        ]);
    }

    public function show(Visit $visit)
    {

        
        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'Visit details',
        ]);
    }

    public function delete(Visit $visit)
    {
        //delete visit
        $visit->delete();

        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'Visit details',
        ]);
    }

}
