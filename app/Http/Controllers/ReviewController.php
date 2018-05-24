<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Imports;
use Session;
use Auth;
class ReviewController extends Controller
{



   /* public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     public function add_review($id)
    {
           $id = $id;
          $review = Review::create([
            'user_id'=>Auth::user()->id,
            'imports_id'=>$id,
          ]);

          Session::flash('success', 'Your review and interests added, successfully');

          return redirect()->back();
    }
  
  public function remove_review($id)
    {
          $id = $id;
          $review = Review::where('user_id', Auth::user()->id)
          ->where('imports_id',$id)->first()
          ->delete();


          Session::flash('success', 'Your review and interests removed, successfully');

          return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
