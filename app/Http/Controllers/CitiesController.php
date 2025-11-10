<?php

namespace App\Http\Controllers;

use App\Models\City;

class CitiesController extends Controller
{
    public function getData($state_id)
    {
        $data = City::where('state_id', $state_id)->orderby('nombre')->get();
        return response()->json($data);
    }

} 