@extends('main')

@section('content')
	<div class="container mt-3">
		<div class="row col-12 d-flex justify-content-between align-items-center">
			<div class="col-10">
				<h2> {{$product->product_name}} Details </h2>
			</div>
			<div class="col-2 d-flex justify-content-end pe-0">
				<a class="btn btn-success" href="{{ route('products.index') }}"> All Products </a>
			</div>
		</div>

		<div class="col-12">
			<table>
				<tr>
					<th>Product Name:</th>
					<td>{{$product->product_name}}</td>
				</tr>
				<tr>
					<th>Product Code:</th>
					<td>{{$product->product_code}}</td>
				</tr>
				<tr>
					<th>Product Details:</th>
					<td>{{$product->product_details}}</td>
				</tr>
				<tr>
					<th>Product Image:</th>
					<td></td>
				</tr>
				<tr>
					<th></th>
					<td><img src="{{url($product->product_image)}}" width="150"></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<tr>
					<th></th>
					<td><a href="{{route('products.edit', $product->id)}}" class="btn btn-primary me-2"> Edit</a><form action="{{route('products.delete', $product->id)}}" method="post" onsubmit="confirm('Are you sure to delete?'); this.submit();"style="display:inline;" class="ms-0">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger ms-0">Delete</button>
						</form></td>
				</tr>
			</table>
		</div>
	</div>
@endsection