<?php

namespace App\Http\Controllers;

use App\Models\Policy; // Import the Policy model
use App\Http\Controllers\Controller; // If extending the base Controller class
use Illuminate\Http\Request;


class PolicyTermController extends Controller // Or simply class Mike if not extending


{


    public function index()
    {

        $policia = Policy::first();
        return view('m_policyterm', compact('policia'));
    }

    public function store()
    {
        $policia_u = Policy::first();
        return view('policyterm_u', compact('policia_u'));
    }


    public function update(Request $request, Policy $policiaupd)
    {
        $policiaupd->policy = $request->policy;
        $policiaupd->term   = $request->term;

        $policiaupd->save();

        return view('m_policyterm', ['policia' => $policiaupd]);
    }
}
