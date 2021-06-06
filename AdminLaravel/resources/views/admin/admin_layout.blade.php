<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản Lý Sản Phẩm</title>
	<link rel="shortcut icon" href="{{asset('/backend/images/icon.png')}}">
	<link rel="stylesheet" href="{{asset('/backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('/backend/css/form.css')}}">
	<link rel="stylesheet" href="{{asset('/backend/css/table.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
	<header>
		<section class="menu">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="menu_left">
						    <ul>
						        <a href = ""><li>Home</li></a>
						        <a href = "{{route('admin.user.show')}}"><li>List User</li></a>
						        <a href = "{{route('admin.user.update', ['id'])}}"><li>Update User</li></a>
						        <a href = "{{route('admin.category.create')}}"><li>Add Categories</li></a>
						        <a href = "{{route('admin.category.show')}}"><li>List Cat</li></a>
						        <a href = "{{route('admin.product.create')}}"><li>Add Product</li></a>
						        <a href = "{{route('admin.product.show')}}"><li>List Product</li></a>
						        <a href = "{{route('admin.product.update', ['id'])}}"><li>Update Product</li></a>
					        </ul>
					</div>
					<div class="col">
						<div class="menu_right">
							<ul>
								<a href = "{{route('admin.user.create')}}"><li>Register</li></a>
								<a href = ""><li>Login</li></a>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>
	<section class="admin_content">
		@yield('admin_content')
	</section>
	<footer>
		<section class="footer">
			<div class="container-fluid">
				<div class="row">
					Copyright 2021. Design by: <b>Van Tuyen</b>
				</div>
			</div>
		</section>
	</footer>
</body>
</html>