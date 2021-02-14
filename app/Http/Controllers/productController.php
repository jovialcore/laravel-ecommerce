<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\ecomm; //we are directing this class to use the  
class productController extends Controller
{


    
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable


     */


    // public function backTocartIndexPage(Store $req){


    //     $imgData = ecomm::where('id', $req->id);
        
    //   return  view ('cart.cartIndex', compact($imgData));
    // }
    public function index()
    {
  
        // this is for list of products
        $listedProd = ecomm::inRandomOrder()->take(5)->get(); //Now i know why you have to loop through collections but you will not need to loop through models like in line 66 and the more reason is that YOU WANT TO FETCH EVERYTHING IN THAT RECORD or TABLE
        return view('productsList.home')->with('items', $listedProd);
        //here you primarily changed th e variable that you intend to use i.e from $listedProd to items.. This is basically what we will be using in the view files... 
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
         //getting my own file path
        //$file_path = public_path('images'. )
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
