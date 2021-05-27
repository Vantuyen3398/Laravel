@extends('admin.admin_layout')
@section('admin_content')
	<div  class="form">
		<h2>Register</h2>
        @if (session('message')) {
            <span class="alert">
                <strong>{{session('message')}}</strong>
            </span>
        }
        @endif
    	<form id="contactform" action="{{route('admin.user.store')}}" method="post"> 
    		@csrf
    		<p class="contact"><label for="name">Name</label></p> 
    		<input id="name" name="name" placeholder="First and last name"  tabindex="1" type="text"> 
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif

    		<p class="contact"><label for="email">Email</label></p> 
    		<input id="email" name="email" placeholder="example@domain.com"  type="email"> 
            @if ($errors->has('email'))
                {{$errors->first('email')}}
            @endif 

            <p class="contact"><label for="username">Create a username</label></p> 
    		<input id="username" name="username" placeholder="username"  tabindex="2" type="text"> 
            @if ($errors->has('username'))
                {{$errors->first('username')}}
            @endif

            <p class="contact"><label for="password">Create a password</label></p> 
    		<input type="password" id="password" name="password"> 
            @if ($errors->has('password'))
                {{$errors->first('password')}}
            @endif

            <p class="contact"><label for="date">Date Of Birth</label></p> 
    		<input type="date" id="date" name="birthday"> 

    		<p class="contact"><label for="img">Avatar</label></p> 
    		<input type="file" id="avatar" name="avatar" > 
            @if ($errors->has('avatar'))
                {{$errors->first('avatar')}}
            @endif

    		<p class="contact"><label for="img">Role</label></p>
    		<select name="role" class="form-control">
                <option value="0">Admin</option>
                <option value="1">Customer</option>
            </select>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Register" type="submit"> 	 
   		</form> 
	</div>
@endsection