<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Infinity - Bootstrap Admin Template</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{ asset('theme/backend') }}/assets/images/logo.png">
	
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/assets/css/bootstrap.css">
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/assets/css/core.css">
	<link rel="stylesheet" href="{{ asset('theme/backend') }}/assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
	<div id="back-to-home">
		<a href="{{ route('frontend.index') }}" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">

		<div class="simple-page-logo animated swing">
			<a href="{{ route('frontend.index') }}">
				<span><i class="fa fa-gg"></i></span>
				<span>SIMARA</span>
			</a>
		</div><!-- logo -->

		<div class="simple-page-form animated flipInY" id="login-form">
			<h4 class="form-title m-b-xl text-center">Silahkan Login Dengan Akun Anda</h4>
			<form action="{{ route('login') }}" method="POST">
				
				@csrf

				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input id="sign-in-password" type="password" name="password" class="form-control" placeholder="Password" required>
				</div>

				<input type="submit" class="btn btn-primary" value="LOG IN">

				@if ($errors->has('email'))
					&nbsp;<span class="text-danger" style="font-size:12px;">>> {{$errors->first('email')}}</span> 
				@endif

				<br>
				
				@if ($errors->has('password'))
					&nbsp;<span class="text-danger" style="font-size:12px;">>> {{$errors->first('password')}}</span> 
				@endif

			</form>
		</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p><a href="#">Copyright, 2018. Fakultas Teknik Universitas Indonesia.</a></p>
		</div><!-- .simple-page-footer -->

	</div><!-- .simple-page-wrap -->
</body>
</html>