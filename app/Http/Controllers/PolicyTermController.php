<?php

namespace App\Http\Controllers;

use App\Models\Policy; // Import the Policy model
use App\Http\Controllers\Controller; // If extending the base Controller class
use Illuminate\Http\Request;


class PolicyTermController extends Controller // Or simply class Mike if not extending


{
 

    public function index ()
    {
            
        $policia = policy::first();
        return view('m_policyterm', compact('policia'));
        
    }

    public function store (Request $request) 
    {
        return $request->all();
    }

    
       public function update (Request $request, policy $policiaupd) 
    
       {
        
        
            $policiaupd = policy::first();
            

            $policiaupd->policy = $request->policy;
            $policiaupd->term = $request->term;

            $policiaupd->save();

            $policia = policy::first();
            return view('m_policyterm', compact('policia'));
        }
}

 