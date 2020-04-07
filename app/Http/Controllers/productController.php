<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ecomm; //we are directing this class to use the  
class productController extends Controller
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
  
        // this is for list of products
        $listedProd = ecomm::inRandomOrder()->take(5)->get();
        return view('productsList.home')->with('items', $listedProd);
        //here you primarily changed th e variable that you intend to use i.e from $listedProd to items.. This is basically what we will be using in the view files... as the new table name!!!
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {// to display the list of pages we have
        //basically what i want is that when a user clicks on a link it should find the id of that item that is in the 
        //DB and send it and return it to another views
        $listedProd = ecomm::where('slug', $slug)->firstOrfail();
        return view('productsList.p')->with('item', $listedProd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
