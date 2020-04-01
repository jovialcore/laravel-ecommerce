@extends('layouts.app')

@section('content')

<div class="col-12">



<h1> Cart </h1>

        @if(session('message'))<!---  I believe that this @ if means if the variable message is SET -->

        <div class="alert alert-success " role="alert">
        <p> {{ session('message') }}  Chai.. wetin dy coronate o</p>
        </div> 
        @endif
Chai.. wetin dy coronate o
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
                            <td class="text-right"><a href=""><button class="btn btn-md btn-success"><i class="fa fa-trash"></i> Save For Later</button> </a> <a href=""><button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Delete </button> </a></td>
                        </tr>
                            @endforeach 
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">255,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
</div>
@endsection

