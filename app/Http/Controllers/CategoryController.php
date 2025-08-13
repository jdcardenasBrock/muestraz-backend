<?php

namespace App\Http\Controllers;

use App\Models\Category_u; // Import the Policy model
use App\Http\Controllers\Controller; // If extending the base Controller class
use Illuminate\Http\Request;


class CategoryController extends Controller // Or simply class Mike if not extending


{ 

    public function index ()
    {
            
        $categoria = Category_u::all();
        return view('index_u', compact('categoria'));
        
    }

   /* public function store () 
    {
        $policia_u = policy::first();
        return view('policyterm_u', compact('policia_u'));
    }

    
       public function update (Request $request, policy $policiaupd) 
    
       {     
            $policiaupd = policy::first();
            
            $policiaupd->policy = $request->policy;
            $policiaupd->term = $request->term;

            $policiaupd->save();

            $policia = policy::first();
            return view('m_policyterm', compact('policia'));
        }*/
}

 