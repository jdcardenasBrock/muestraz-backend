<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller; // If extending the base Controller class
use Illuminate\Http\Request;
use App\Models\MembershipType;

class MembershipController extends Controller
{
   public function index()
    {

        $membership = MembershipType::all();
        return view('m_membership', compact('membership'));
    }

    
}
