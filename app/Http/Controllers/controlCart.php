<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlCart extends Controller
{
    public function index(){
       return view('cart.cartIndex'); 

    }
//we use this to check for duplication
    public function store(Request $request){
		
		$duplication = \Cart::search(function($cartStuff, $id) use ($request) {

			return $cartStuff->id === $request->id;

		}); 

		if($duplication->isNotEmpty()){
			 //lets show the message

			return redirect('/cart')->with('success', 'Item already exist   in your cart'); 
		}

     \Cart::add($request->id, $request->name, 1, 3)->associate('App\ecomm')   ;  
     return redirect('/cart')->with('success', 'Your item has been added to cart!'); 
    }

    public function destroy($id) {
    	\Cart::remove($id);
    	return redirect('/cart')->with('success', 'item has been successfully removed');
    }

//save for later cart
    public function saveForLater(Request $request) {

 			$idSave = \Cart::get($request->id); 
 		

    						//check for duplicate
    			$duplicate = \Cart::instance('default')->search(function($cartItem, $id) use ($request) {
    			
    				return $cartItem->rowId === $request->id;
    			});
    				// if there are duplicates display that message
    				if ($duplicate->isNotEmpty()){
				
    				\Cart::instance('saveForLater')->add($idSave->id, $idSave->name,1,3)->associate('App\ecomm');

    		$duplicat = \Cart::instance('saveForLater')->search(function($cartItem, $id) use ($request) {
    			
    				return $cartItem->rowId === $request->id;
    			});

    		if ($duplicat->isNotEmpty()) {
    			return redirect('/cart')->with('success', 'Item was successfully saved for later collection');
    		}
    			
 			
    		}else {

    			return redirect('/cart')->with("success", "{$idSave->name} already exit in save for later ");
    				
			}
    }

    public function delSaveForLater ($id) {

    	\Cart::instance('saveForLater')->remove($id);
    	return redirect('/cart')->with('success', 'item was successfully deleted from save-for-later');
    }
}
 