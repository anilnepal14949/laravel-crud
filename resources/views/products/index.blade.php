@extends('main')

@section('content')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> Products List </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('products.create') }}"> Add Product </a>
			</div>
		</div>
		@if($message = session("message")) 
			<div class="alert alert-success">{{$message}}</div>
		@endif
		<table class="table table-striped table-bordered">
			<tr>
				<th>S.No.</th>
				<th>Product Name</th>
				<th>Product Code</th>
				<th width="400">Product Details</th>
				<th>Product Image</th>
				<th>Actions</th>
			</tr>
			@if(empty($products->toArray()))
				<tr>
					<th colspan="6"> {{__('No Products Added! Add a new product first...')}} </th>
				</tr>
			@else
				@foreach($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->product_name}}</td>
						<td>{{$product->product_code}}</td>
						<td>{{substr($product->product_details,0, 50)}}...</td>
						<td><img src="{{url($product->product_image)}}" width="100"></td>
						<td><a href="{{route('products.show',$product->id)}}" class="btn btn-info me-2"> Show</a><a href="{{route('products.edit', $product->id)}}" class="btn btn-primary me-2"> Edit</a><form action="{{route('products.delete', $product->id)}}" method="post" onsubmit="confirm('Are you sure to delete?'); this.submit();"style="display:inline;" class="ms-0">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger ms-0">Delete</button>
						</form>
						</td>
					</tr>
				@endforeach
			@endif
		</table>
		{{ $products->links() }}
	</div>
@endsection