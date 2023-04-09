<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        if (auth()->user()->type =='admin') {
            return redirect()->route('admin.dashboard');
        }
        else if (auth()->user()->type =='prof') {
            return redirect()->route('prof.dashboard');
        }
        else if (auth()->user()->type =='user'){
            return redirect()->route('dashboard');
        } 
    }
    public function etudDashboard()
    {
        return view('etudHome');
    }
    public function profDashboard()
    {
        return view('profHome');
    }

    public function adminDashboard()
    {
        return view('admineHome');
    }
}
