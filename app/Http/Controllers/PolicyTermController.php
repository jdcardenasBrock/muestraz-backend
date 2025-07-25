<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyTermController extends Controller
{
    //
    public function index (){

        $policyterm=policy_term::all();
        return view (policy_term.index, compact('policy_term'));
        
    }
}
