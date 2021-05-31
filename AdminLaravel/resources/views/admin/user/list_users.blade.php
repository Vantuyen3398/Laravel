@extends('admin.admin_layout')
@section('admin_content')
	<center>
		<table class="styled-table">
		    <thead>
		        <tr>
		        	<th style="text-align: center">No.</th>
		            <th style="text-align: center">Name</th>
		            <th style="text-align: center">Email</th>
		            <th style="text-align: center">Username</th>
		            <th style="text-align: center">Birthday</th>
		            <th style="text-align: center">Avatar</th>
		            <th style="text-align: center">Role</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($users as $user)
		    		<tr>
		    			<td style="text-align: center">{{$user['id']}}</td>
		    			<td style="text-align: center">{{$user['name']}}</td>
		    			<td style="text-align: center">{{$user['email']}}</td>
		    			<td style="text-align: center">{{$user['username']}}</td>
		    			<td style="text-align: center">{{$user['birthday']}}</td>
		    			<td><img src="/backend/images/avatar/{{$user['avatar']}}"height="80" width="80"></td>
		    			<td style="text-align: center">{{$user['role']}}</td>
		    		</tr>
		    	@endforeach
		    </tbody>
		</table>

		<span>{{$users->links()}}</span>
	</center>
@endsection