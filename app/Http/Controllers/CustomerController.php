<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Sales;
use App\Imports;
use App\Deal;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
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
        $customer = Customer::OrderBy('created_at','DESC')->paginate(20);
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $image_name = null;

        if($request->image !== null) {
            $file= $request->file('image');
            $image_name = uniqid().$file->getClientOriginalName();
            $file->move(base_path('/uploads/files/customer'), $image_name);
           }

       $customer =  new Customer;
       $customer->name = $request->name;
       $customer->phone = $request->phone;
       $customer->email = $request->email;
       $customer->image = '/wahdatshop/uploads/files/customer/'.$image_name;
       $customer->address = $request->address;
       $customer->extra_info = $request->extra_info;
       $customer->save();
Session::flash('success','added successfully');

       return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
         $customer = Customer::where('id', $id)->first();

        return view('customer.show', compact('customer'));
    } 

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customer = Customer::where('id',$id)->first();
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $image_name = null;

         if($request->image !== null) {
             $file= $request->file('image');
             $image_name = uniqid().$file->getClientOriginalName();
             $file->move(base_path('/uploads/files/customer'), $image_name);
            }

        $customer =  Customer::where('id', $id)->first();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->image = '/wahdatshop/uploads/files/customer/'.$image_name;
        $customer->address = $request->address;
        $customer->extra_info = $request->extra_info;
        $customer->save();
Session::flash('success','updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::where('id', $id)->first()->delete();
        Session::flash('success','deleted successfully successfully');
        return redirect()->back();
    }


    public function search(request $request)
    {
        $customers = Customer::where('name','like','%'.$request->search_customer.'%')->take(8)->paginate(3);
        return view('customer.search', compact('customers'));
    }




   
}
