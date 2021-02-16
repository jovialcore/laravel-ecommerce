@extends('layouts.app')
@section('content')

		<!-- <div class="col-lg-3">
			<h4 class="my-4">Corona Virus</h4>
			<div class="list-group"> 
				<a href="" class="list-group-item active">Corona drugs</a>
				<a href="" class="list-group-item">Corona protectives</a>
				<a href="" class="list-group-item">Corona update</a>
			</div>
	</div> -->
<!--- We dont have any loop  -->
		<div class="col-lg-7 col-md-6 mb-4 mt-5 mx-auto">
			<div class="d-flex flex-row bg-white" style="border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; position:relative;>
				<a href="{{ $item->slug }}"> 
				
				
				<img class="" style=" width:200px;" src="{{url('images/',$item->img)}}"> </a>


				<div class="card-body clearfix" >
					<h4 class="card-title">     <a href="/items/ {{ $item->slug }}">{{ $item->name }}</a></h4>

					  <h5>  {{ $item->price }} </h5>
					   <p class="card-text">{{ $item->description }}</p>


					   <form  class="clear-fix" action="/cart/add" method="POST" >
					   		@csrf
					   		
					   		<input type="hidden" name="id" value="{{ $item->id }}">
					   		<input type="hidden" name="name" value="{{ $item->name }}">
					   		<input type="hidden" name="Image" value="{{ $item->Image}}">
					   		<button type="submit" class="btn btn-primary float-right mr-3 mb-2" style="position:absolute; bottom:0; right:0;">Add to cart</button>
					   </form> 
					  
				</div>
				</div>
				  <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
		
		</div>

@endsection