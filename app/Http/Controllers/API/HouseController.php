<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function index()
    {
        //query all visits using House model
        $houses = House::all();

        //return in JSON format
        return response()->json([
            'success' => true,
            'message' => 'List of all houses',
            'data' => $houses
        ]);
    }

    
    public function store(Request $request)
    {
        //store data - POPO
        $house = new House();
        $house ->jenis_rumah = $request->jenis_rumah;
        $house ->alamat = $request->alamat;
        $house->save();

        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'House information saved',
        ]);
    }

    public function show(House $house)
    {

        
        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'House details',

            'data'=> $house
        ]);
    }

    public function delete(House $house)
    {
        //delete visit
        $house->delete();

        //return success in json format
        return response()->json([
            'success'=>true,
            'message'=> 'House details',
        ]);
    }
}
