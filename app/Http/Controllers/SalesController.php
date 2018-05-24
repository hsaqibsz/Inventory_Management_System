<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Customer;
use App\Imports;
use App\Deal;
use DB;
use Auth;
use Illuminate\Http\Request;
use Session;

class SalesController extends Controller
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
         $sales = Sales::orderBy('created_at','DESC')->paginate(3);
         $customers = Customer::orderBy('created_at', 'DESC')->paginate(3);


     
   if (Auth::user()->admin !== 1) {
      return redirect()->back();
   }

         return view('sales.index', compact('sales','customers'));
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
        
         
        $imports_id_with_price =  $request->imports_id;

        $imports_id = strtok($imports_id_with_price, ",");  // this is array of string becouse we use this function
        $imports  = Imports::where('id', $imports_id)->first();
        $p_quantity = $imports->p_quantity;

    
       /* $discount = $request->discount;
        $profit=$imports->profit;
        $price=$imports->price;
        $paid = $request->paid;
        $quantity = $request->quantity;
        $total_discount = round($price*$discount/100*$quantity);
        $unit_profit = ceil($price*$profit/100);

        $price2 = $price + $unit_profit;
        $total_profit = $unit_profit*$quantity;
        $total = $price2*$quantity-$request->paid; 
        $net_total = $total-$total_discount;


        if($paid == null ) {
            $paid = 0;
        }*/


        $sales = new Sales;

        $sales->user_id = Auth::user()->id;
        $sales->customer_id = $request->customer_id;
        $sales->imports_id = $imports_id;
        $sales->quantity = $request->quantity;
        $sales->description = $request->description;
       // bill_number we should assign customer's phone number to that with something extra
        $sales->imports_id = $imports->id;
        $sales->price= $request->price1;
        $sales->priceDefault= $request->priceDefault;
        $sales->profit = $request->profit;
        $sales->discount = $request->discount;
        $sales->total = $request->total1;
        $sales->net_total = $request->net_total1;
        $sales->paid = $request->paid;
        $sales->balance = $request->net_total1;
        $sales->save();
    
    //update imports table
   $imports->p_quantity = $p_quantity-$request->quantity;
   $imports->save(); 

    Session::flash('success','sales added Successfully.');
        return redirect()->back();

 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales, $id)
    {
        $sale = Sales::where('id', $id)->first();
        $imports = Imports::all();
        return view('sales.edit', compact('sale','imports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //dd($request->all());
             $imports_id_with_price =  $request->imports_id;

             $imports_id = strtok($imports_id_with_price, ",");  // this is array of string becouse we use this function
             $imports  = Imports::where('id', $imports_id)->first();
             $p_quantity = $imports->p_quantity;
             
/*
             $price=$imports->price;
             $price= $request->price;
             $paid = $request->paid;
             $quantity = $request->quantity;
             $discount = $request->discount; 


             $total = $price*$quantity-$request->paid; 
             $total_discount = $price*$discount/100*$quantity;
             $net_total = $total-$total_discount;

             if($paid == null ) {
                 $paid = 0;
             }
             */


             $sales = Sales::where('id', $id)->first();

              //update imports table
                  $final_quantity = 0;
                  if ($request->quantity> $sales->quantity) {
                     $final_quantity = $request->quantity-$sales->quantity;
                  }elseif($request->quantity<$sales->quantity){
                     $final_quantity =  $request->quantity-$sales->quantity;
                  }
                  else{
                     $final_quantity = 0;
                  }
             $imports->p_quantity = $p_quantity-$request->quantity;
              $final_quantity;
             $imports->save(); 
             //updated

             $sales->user_id = Auth::user()->id;
             $sales->customer_id = $request->customer_id;
             $sales->imports_id = $imports_id;
             $sales->quantity = $request->quantity;
             $sales->description = $request->description;
            // bill_number we should assign customer's phone number to that with something extra
             $sales->imports_id = $imports->id;
             $sales->price = $request->price;//possible to change here and should change 

             $sales->discount = $request->discount;
             $sales->total = $request->total1;
             $sales->net_total = $request->net_total1;

             $sales->paid = $request->paid;              
             $sales->balance = $request->net_total1;
             $sales->save();
         


      Session::flash('success','updated Successfully.');

             return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sales::where('id', $id)->first()->delete();
        Session::flash('success','deleted Successfully.');
        return redirect()->back();
    }

    public function sale($id)
    {
       
         $customer = Customer::where('id', $id)->first();
         $customers = Customer::all();
         $imports = Imports::all();
         $sales = Sales::where('customer_id', $id)->get();
         $total_balance = DB::table('sales')
         ->where('customer_id', $id)
         ->sum('balance');


        return view('sales.create', compact('customer', 'sales', 'customers', 'imports','total_balance'));
    }


    public function print($id){
         $customer = Customer::where('id', $id)->first();
         $customers = Customer::all();
         $imports = Imports::all();
         $sales = Sales::where('customer_id', $id)->get();
       
          $total_balance = DB::table('sales')
         ->where('customer_id', $id)
         ->sum('balance');

         $total_transactions = DB::table('sales')
         ->where('customer_id', $id)
         ->count('balance');

   Session::flash('info','if print menu does not loaded, reload the page.');
        return view('sales.print', compact('customer', 'sales', 'customers', 'imports', 'total_balance','total_transactions'));
    }  

  public function print_last($id){
         $customer = Customer::where('id', $id)->first();  

         $total_transactions = DB::table('sales')
         ->where('customer_id', $id)
         ->count('balance');

         $customers = Customer::all();
         $imports = Imports::all();
         $sales = Sales::where('customer_id', $id)->orderBy('created_at', 'DESC')->take(1)->get();
       
          $total_balance = DB::table('sales')
         ->where('customer_id', $id)
         ->sum('balance');
         Session::flash('info','if print menu does not loaded, reload the page.');

        return view('sales.print', compact('customer', 'sales', 'customers', 'imports', 'total_balance','total_transactions'));
    }

}
