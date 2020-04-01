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
     return view('cart.cartIndex')->with('message', 'Item was added to the cart'); 
    }
}
