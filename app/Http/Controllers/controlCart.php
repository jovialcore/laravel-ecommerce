<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ecomm;
class controlCart extends Controller
{
    public function index(Request $req){ // for image stuff

        // dd($req->id);

        // $getImg = ecomm::where('Image', $req->Image);
            
       return view('cart.cartIndex'); 
        // return redirect('/cartImage');

    }
//we use this to check for duplication
    public function store(Request $request){
		
		$duplication = \Cart::search(function($cartStuff, $id) use ($request) {

            //closure like the on abovr simply means getting the return value of a method/function as ana attribute of another function

			return $cartStuff->id === $request->id;

		}); 

		if($duplication->isNotEmpty()){
			 //lets show the message

			return redirect('/cart')->with('success', 'Item already exist in your cart'); 
		}
        
   $jovial = \Cart::add($request->id, $request->name, 3, $request->Image, 8)->associate('App\ecomm');  


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
		\Cart::instance('saveForLater')->add($idSave->id, $idSave->name, 3, $idSave->Image, 1)->associate('App\ecomm');	
    return redirect('/cart')->with("success", "{$idSave->name} was successfully saved for later collection");	

   } 

	}
}

public function moveToLater ($id){
	//remember that a model is representation of a ROW in your database
	// A collection is a fancy array with benefits. a collection is not a record in the database

    $searchDefaultClass = \Cart::instance('default')->search( function ($cartItem, $row){

                return $rowId === $id;
    });

    if (!$searchDefaultClass->isNotEmpty()){
        $idSave = \Cart::instance('saveForLater')->get($id);
        \Cart::instance('default')->add($idSave->id, $idSave->name, 3, $request->Image, 1)->associate('App\ecomm');
        \Cart::instance('saveForLater')->remove($id);
        return redirect('/cart')->with("success", "{$idSave->name} was successfully moved to this cart for checkout");    
    }
}

    public function delSaveForLater ($id) {

    	\Cart::instance('saveForLater')->remove($id);
    	return redirect('/cart')->with('success', 'item was successfully deleted from save-for-later');
    }


    public function pay() {

        return view('checkout.pay');
    }
}
 