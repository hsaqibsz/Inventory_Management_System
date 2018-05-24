<?php

namespace App\Http\Controllers;

use App\Imports;
use App\Category;
use Illuminate\Http\Request;
use Storage;

class ImportsController extends Controller
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
       $imports = Imports::orderBy('created_at','ACE')->paginate(10);
       return view('imports.index', compact('imports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('imports.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              $file_name= null;

              if ($request->p_image !== null) {
                  $file = $request->file('p_image');
                  $file_name = uniqid().$file->getClientOriginalName();
                  $file->move(base_path('/uploads/files/imports'), $file_name);
                  // Storage::put($file_name);
              }

       $imports = new Imports;
       $imports->p_name = $request->p_name;
       $imports->category_id = $request->category_id;
       $imports->p_image = '/wahdatshop/uploads/files/imports/'.$file_name;  // here /wahdatshop/ is for sub domain
       $imports->p_quantity = $request->p_quantity;
       $imports->price = $request->price;
       $imports->profit = $request->profit;
       $imports->country = $request->country;
       $imports->neworuse = $request->neworuse;
       $imports->quality = $request->quality;
       $imports->guaranty = $request->guaranty;
       $imports->save();
       return redirect(route('imports.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imports  $imports
     * @return \Illuminate\Http\Response
     */
    public function show(Imports $imports, $id)
    {
       $imports =  Imports::where('id',$id)->first();
       $related = Imports::where('category_id', $imports->category_id)->get();
       $category = Category::all();

       return view('imports.show', compact('imports','related','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imports  $imports
     * @return \Illuminate\Http\Response
     */
    public function edit(Imports $imports)
    {
         /*$category = Category::all();
         return view('imports.edit', compact('category'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imports  $imports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
           
           $p_image = null;

          $imports = Imports::where('id', $id)->first();
 
             $p_image= null;

              if ($request->p_image !== null) {
                  $file = $request->file('p_image');
                  $p_image = uniqid().$file->getClientOriginalName();
                  $file->move(base_path('/uploads/files/imports'), $p_image);
                  // Storage::put($file_name);
              }else{
                $p_image = $imports->p_image;
                
              }

               

           $imports ->category_id = $request->category_id;
           $imports->p_name = $request->p_name;

           if ($request->p_image !== null) {
             
           $imports->p_image = '/wahdatshop/uploads/files/imports/'.$p_image;
           }else{

           $imports->p_image = $p_image;
           }

           $imports->p_quantity = $request->p_quantity;
           $imports->price = $request->price;
          // $imports->price = $request->price;
           $imports->country = $request->country;
           $imports->neworuse = $request->neworuse;
           //$imports->quality = $request->quality;
              $imports->guaranty = $request->guaranty;

           $imports->save();

           return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imports  $imports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imports $imports, $id)
    {
       Imports::where('id', $id)->first()->delete();
       return redirect(route('imports.index'));
    }
}
