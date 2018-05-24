<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Sales;
use App\Imports;
use App\Deal;
use DB;
use Illuminate\Http\Request;
use Auth;

class DealController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $debit = $request->debit;
        $credit = $request->credit;

        if ($debit == null) {
            $debit =0; 
        }

         if ($credit == null) {
            $credit =0;
             }
             

        $deal = new Deal;
        $deal->user_id = Auth::user()->id;
        $deal->customer_id = $request->customer_id;
        $deal->description = $request->description;
        $deal->bill_number = rand(2, 100);
        $deal->credit = $credit;
         $deal->debit = $debit;
         $deal->balance = $credit-$debit;
         $deal->save();



         $customer = Customer::where('id', $request->customer_id)->first();
         $customers = Customer::all();
         $imports = Imports::all();
         $deals = Deal::where('customer_id', $request->customer_id)->get();

           $total_balance = DB::table('deals')
            ->where('customer_id', $request->customer_id)
            ->sum('balance');


        return view('deal.create', compact('customer', 'deals', 'customers', 'imports', 'total_balance'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
          $deal = Deal::where('id', $deal->id)->first();
           $deal->delete();
        return redirect()->back();
    }


    public function deal(Request $request, $id)
    {
       
         $customer = Customer::where('id', $id)->first();
         $customers = Customer::all();
         $imports = Imports::all();
         $deals = Deal::where('customer_id', $id)->get();

         $total_balance = DB::table('deals')
          ->where('customer_id', $request->customer_id)
          ->sum('balance');


        return view('deal.create', compact('customer', 'deals', 'customers', 'imports', 'total_balance'));
    }


    public function print($id){
        $customer = Customer::where('id', $id)->first();
         $customers = Customer::all();
         $imports = Imports::all();
         $deals = Deal::where('customer_id', $id)->get();

         $total_balance = DB::table('deals')
          ->where('customer_id', $id)
          ->sum('balance');


        return view('deal.print', compact('customer', 'deals', 'customers', 'imports', 'total_balance'));
    }

}
