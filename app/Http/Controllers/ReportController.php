<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Deal;
use App\Sales;
use Session;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{


	public function __construct()
	{
	    $this->middleware('admin');
	}


	
	public function sales_english()
	{
		$sales = Sales::all();

		$total_profit = DB::table('sales')
		->sum('profit');

		$total_loans = DB::table('sales')
		->sum('balance');

		$total_paid = DB::table('sales')
		->sum('paid');
    Session::flash('info','if print menu does not loaded, reload the page.');
		return view('reports.sales_english', compact('sales','total_profit', 'total_loans', 'total_paid'));
	}


	public function sales_pashto()
	{
		$sales = Sales::all();

		$total_profit = DB::table('sales')
		->sum('profit');

		$total_loans = DB::table('sales')
		->sum('balance');

		$total_paid = DB::table('sales')
		->sum('paid');
  Session::flash('info','if print menu does not loaded, reload the page.');

		return view('reports.sales_pashto', compact('sales','total_profit', 'total_loans', 'total_paid'));
	}
    
}
