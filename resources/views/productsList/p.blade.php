@extends('layouts.app')
@section('content')

		<div class="col-lg-3">
			<h4 class="my-4">Corona Virus</h4>
			<div class="list-group"> 
				<a href="" class="list-group-item active">Corona drugs</a>
				<a href="" class="list-group-item">Corona drugs</a>
				<a href="" class="list-group-item">Corona drugs</a>
			</div>
	</div>

		<div class="col-lg-9 col-md-6 mb-4">
			<div class="card h-100">
				<a href="{{ $item->slug }}"> <img class="card-img-top img-fluid" src="http://placehold.it/900x350"> </a>
				<div class="card-body">
					<h4 class="card-title">     <a href="/items/ {{ $item->slug }}">{{ $item->name }}</a></h4>

					  <h5>  {{ $item->price }} </h5>
					   <p class="card-text">{{ $item->description }}</p>


					   <form action="/cart/add" method="POST" >
					   		@csrf
					   		
					   		<input type="hidden" name="id" value="{{ $item->id }}">
					   		<input type="hidden" name="name" value="{{ $item->name }}">
					   		<button class="btn btn-primary">Add to cart</button>
					   </form> 
					  
				</div>
				
				  <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
			</div>
		</div>

@endsection