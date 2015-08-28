<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cubeupload</title>

	@yield('head')

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/cubeupload.css?v=1') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<script>
		cubeupload = {};
		cubeupload.csrf_token = '{{ csrf_token() }}';
		cubeupload.env = {};
		cubeupload.env.image_user_url = '{{ env('IMAGE_USER_URL') }}';
	</script>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">cubeupload</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/account') }}">Account</a></li>
								<li><a href="{{ url('/settings') }}">Settings</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
						<li>
							<a href="{{ url('/images') }}">Images</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<footer class="footer">
      <div class="container">
        <div class="row">
        	<div class="col-md-4 col-md-offset-4">
        		<div class="col-md-2">
        			<a href="{{ url('/about') }}">About</a>
        		</div>
        		<div class="col-md-2">
        			<a href="{{ url('/contact') }}">Contact</a>
        		</div>
        		<div class="col-md-2">
        			<a href="{{ url('/help') }}">Help</a>
        		</div>
        		<div class="col-md-2">
        			<a href="{{ url('/terms') }}">Terms</a>
        		</div>
        		<div class="col-md-2">
        			<a href="{{ url('https://twitter.com/cubeupload') }}">Twitter</a>
        		</div>
        	</div>
        </div>
      </div>
    </footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script src="{{ asset('/js/validator.js') }}"></script>
	<script src="{{ asset('/js/cubeupload.js?v=1') }}"></script>
	
	@yield('scripts')

</body>
</html>