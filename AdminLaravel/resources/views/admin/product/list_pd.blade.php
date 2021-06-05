@extends('admin.admin_layout')
@section('admin_content')
	<center>
		@if (session('message'))
            <span class="alert">
                <strong>{{session('message')}}</strong>
            </span>
        @endif
		<table class="styled-table">
		    <thead>
		        <tr>
		        	<th style="text-align: center">No.</th>
		            <th style="text-align: center">Product Name</th>
		            <th style="text-align: center">Category Name</th>
		            <th style="text-align: center">Price</th>
		            <th style="text-align: center">Product Image</th>
		            <th style="width: 100px;text-align: center">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($products as $key => $product)
		    		<tr>
		    			<td style="text-align: center">{{$product->product_id}}</td>
		    			<td style="text-align: center">{{$product->product_name}}</td>
		    			<td style="text-align: center">{{$product->cat_name}}</td>
		    			<td style="text-align: center">{{$product->price}}</td>
		    			<td><img src="/backend/images/product/{{$product->image}}"height="80" width="80"></td>
		    			<td style="width: 40px;text-align: center;">
	                        <a href="{{'edit/'.$product->product_id}}">
	                          <button type="button" class="btn btn-block btn-info">EDIT</button>
	                        </a> 
	                        <a onclick="return confirm('Are you want to delete?')" href="{{'delete/'.$product->product_id}}">
	                          <button type="button" class="btn btn-block btn-danger">DELETE</button>
	                        </a>
	                    </td>
		    		</tr>
		    	@endforeach
		    </tbody>
		</table>

		<span>{{$products->links()}}</span>
	</center>
@endsection