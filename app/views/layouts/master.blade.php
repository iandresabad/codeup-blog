<!doctype html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/BootStrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="public/BootStrap/css/carousel.css"/>
	<link rel="stylesheet" type="text/css" href="/stylesheet.css">
	<link rel="shortcut icon" href="img/Arches v2-6.jpg" />
	<!-- @yield('tab-title') -->
</head>
<body>
	<style>
		ul,li {display: inline; }
		#main-content {
			padding-top: 50px;
		}
	</style>
	<title>@yield('title')</title>
	@if (Session::has('succesMessage'))
		<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
		<div clas="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	<!-- navbar -->
	<div id="navbar" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<a href="/" class="navbar-brand">IvanAndresAbad.me</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navHeaderCollapse nav-pills">
					<ul class="nav navbar-nav navbar-right">
						<li class="{{ Request::is('resume') ? 'active' : '' }}"><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
						<li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
						<li><a href="{{action('PostsController@index') }}">Posts<a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->
	<div id="main-content" class="container">
	@yield('content')
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	@yield('bottom-script')
	</div>
</body>
</html>