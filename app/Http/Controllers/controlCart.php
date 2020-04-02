<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlCart extends Controller
{
    public function index(){
       return view('cart.cartIndex'); 

    }

    public function store(Request $request){
     \Cart::add($request->id, $request->name, 1, 2)->associate('App\ecomm')   ;  
     return redirect('/cart')->with('success', 'Your item has been added to cart!'); 
    }

    public function destroy($id) {
    	\Cart::remove($id);

    	return redirect('/cart')->with('success', 'item has been successfully removed');
    }
}
 