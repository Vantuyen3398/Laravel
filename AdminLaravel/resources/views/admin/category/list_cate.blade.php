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
		            <th style="text-align: center">Name</th>
		            <th style="width: 100px;text-align: center">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($cate as $cat)
		    		<tr>
		    			<td style="text-align: center">{{$cat['cat_id']}}</td>
		    			<td style="text-align: center">{{$cat['cat_name']}}</td>
		    			<td style="width: 40px;text-align: center;">
	                        <a onclick="return confirm('Are you want to delete?')" href="{{'delete/'.$cat['cat_id']}}">
	                          <button type="button" class="btn btn-block btn-danger">DELETE</button>
	                        </a>
	                    </td>
		    		</tr>
		    	@endforeach
		    </tbody>
		</table>

		<span>{{$cate->links()}}</span>
	</center>
@endsection