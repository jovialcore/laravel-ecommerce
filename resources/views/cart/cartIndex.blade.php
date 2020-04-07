@extends('layouts.app')

@section('content')

<div class="col-12">



<h1> Cart </h1>

        @if(session()->get('success'))<!---  I believe that this @ if means if the variable message is SET -->

        <div class="alert alert-success " role="alert">
        <p> {{ session()->get('success') }}</p>
        </div> 
        @endif
        
        @if(Cart::count() > 0 )
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach(Cart::content() as $item)
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>{{$item->model->name}}</td>
                            <td>{{ $item->model->description }}</td>
                            <td><input class="form-control" type="text" value="1" /></td>
                            <td class="text-right">{{$item->model->price}}</td>
                            <td class="text-right">
                                  
                            
                            <form action="/cart/saveForLater/{{$item->rowId}}" method="POST"> 
                                         @csrf
                                <button class="btn btn-md btn-success"><i class="fa fa-trash"></i> Save For Later</button>
                            </form>
                          
                            </td>

                            <td >
                                <form action="/cart/del/{{$item->rowId}}" method="POST"> 
                                         @csrf
                                         @method('DELETE')
                                     
                                <button class="btn btn-md btn-danger" type="submit"> {{-- <i class="fa fa-trash"></i> --}} Delete </button>  
                                </form>
                            </td>
                            
                        </tr>
                            @endforeach 
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"> {{Cart::subtotal()}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td class="text-right">N {{ Cart::tax()}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>N {{ Cart::total() }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
@else
        <h1> No items in cart </h1>
@endif






<h1> Save For Later </h1>


        @if(Cart::instance('saveForLater')->count() > 0 )
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach(Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>{{$item->model->name}}</td>
                            <td>{{ $item->model->description }}</td>
                            <td><input class="form-control" type="text" value="1" /></td>
                            <td class="text-right">{{$item->model->price}}</td>
                            <td class="text-right">


                         </td>
                               

                            <td >
                                <form action="/cart/delSaveForLater/{{$item->rowId}}" method="POST"> 
                                         @csrf
                                         @method('DELETE')
                                     
                                <button class="btn btn-md btn-danger" type="submit"> {{-- <i class="fa fa-trash"></i> --}} Delete </button>  
                                </form>
                            </td>
                            
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
@else
        <div class="alert alert-success"> 
        You have no item saved for later! 
    </div>
@endif
</div>
@endsection

