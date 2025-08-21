<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        return view('webpage.index_u');
    }

    public function dashboard()
{
    $user = Auth::user();

    if ($user->account_type === 'admin') {
        return view('index'); // dashboard admin
    }

    if ($user->account_type === 'user') {
        return view('webpage.collection'); // dashboard cliente
    }

    return view('errors.404');
}

    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return view('errors.404');
    }
}
