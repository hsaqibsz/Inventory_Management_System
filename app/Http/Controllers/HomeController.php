<?php

namespace App\Http\Controllers;
use App\Imports;

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
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
         $imports = Imports::orderBy('created_at', 'DESC')->paginate(3);
        return view('about', compact('imports'));
    } 

    public function welcome()
    {
         $imports = Imports::orderBy('created_at', 'DESC')->paginate(3);
        return view('welcome', compact('imports'));
    }

     public function order()
    {
          
        return view('front.contact_order');
    }

     public function index()
    {

        return view('home');
    }

    public function pricing(Request $request)
    {
        return view('front.pricing');
    }
}
