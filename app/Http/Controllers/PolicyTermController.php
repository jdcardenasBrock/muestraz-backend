<?php

namespace App\Http\Controllers;

use App\Models\Policy; // Import the Policy model

use App\Http\Controllers\Controller; // If extending the base Controller class


 class PolicyTermController extends Controller // Or simply class Mike if not extending


{
 

    public function index (){
            
        $policia = policy::first();
        return view('m_policyterm', compact('policia'));
    }
}

