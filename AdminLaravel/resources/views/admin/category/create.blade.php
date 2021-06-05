@extends('admin.admin_layout')
@section('admin_content')
	<div  class="form">
		<h2>Add Categories</h2>
        @if (session('message'))
            <span class="alert">
                <strong>{{session('message')}}</strong>
            </span>
        @endif
    	<form id="contactform" action="{{route('admin.category.store')}}" method="post"> 
    		@csrf
    		<p class="contact"><label for="name">Cate Name</label></p> 
    		<input id="name" name="cat_name" placeholder="First and last name"  tabindex="1" type="text"><br> 
            @if ($errors->has('cat_name'))
                <span class="has-error">
                    <strong>{{$errors->first('cat_name')}}</strong>
                </span>
                <br>
            	<br>
            @endif
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Add Categories" type="submit"> 	 
   		</form> 
	</div>
@endsection