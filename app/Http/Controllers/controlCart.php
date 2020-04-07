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
    	return redirect('/cart')->with("success", " item has been successfully removed");
    }

//save for later cart
    public function saveForLater($id) {
    	//this feature took me real good 5 days to fix. Mehn!!!
    	//it is a validation that prevents a cart item from being added to saveForLater when it already exist!

    	//here is how it works
    	 $idSave = \Cart::instance('default')->get($id);
  // search in the default intance class cart first for the cart item id that is being sent across from the serve
    	$dup = \Cart::instance('default')->search(function($cartItem, $rowId) use ($id){	
    				return $rowId === $id;

    			});
    		if ($dup->isNotEmpty()){
    			//if it is empty, the search for the id in the saveForLater cart for that id.

    			$dupl = \Cart::instance('saveForLater')->search(function($cartItem, $rowId) use ($id){
    					
    				return $rowId === $id;

    			});	
    			//if Id of the cart item is inside the two carts...
    		if ($dup->isNotEmpty() and $dupl->isNotEmpty()) {

    			//then say that it already exist in the cart...
    		return 	redirect('/cart')->with("success", "{$idSave->name} already exist in the cart ");
    
}     			 
	else {	//if not, then save the item to savForLater cart and redirect with the message

		$idSave = \Cart::instance('default')->get($id);
		\Cart::remove($id); 
		\Cart::instance('saveForLater')->add($idSave->id, $idSave->name,1,3)->associate('App\ecomm');	
    return redirect('/cart')->with("success", "{$idSave->name} was successfully saved for later collection");	

   } 

	}
}

public function moveToLater ($id){
	//remember that a model is representation of a ROW in your database
	// A collection is a fancy array with benefits. a collection is not a record in the database
}

    public function delSaveForLater ($id) {

    	\Cart::instance('saveForLater')->remove($id);
    	return redirect('/cart')->with('success', 'item was successfully deleted from save-for-later');
    }
}
 