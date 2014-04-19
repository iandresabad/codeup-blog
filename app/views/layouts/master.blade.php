<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<!--this is what creates that navbar look-->
	<link rel="stylesheet" type="text/css" href="../../BootStrap/css/bootstrap.css"/>

	<!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="../../signin.css" rel="stylesheet">

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	@yield('topscript')
	<!-- @yield('tab-title') -->
</head>
<body>
	<style>
		ul,li {display: inline; }
		#main-content {
			padding-top: 20px;
		}
		.alert.alert-danger 
		{
		margin-top: 15px;
		}
		.alert.alert-success{
		margin-top: 15px;
		}
		.featurette-heading {
		margin-top: 5px;
		}
	</style>
	<title>@yield('title')</title>
	<!-- navbar -->
 	<div class="navbar-wrapper">  
      <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="mailto: iandresabad@yahoo.com">IvanAndresAbad.me</a>
					</div>
						<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								@if (Auth::check())
								<li class="blog-nav-item active"><a href="{{{ action('HomeController@logout') }}}">Logout ({{{ Auth::user()->email }}})</a></li>
								@else
								<li class="blog-nav-item active"><a href="{{{ action('HomeController@showLogin') }}}">Login</a></li>
								@endif
								<li class="{{ Request::is('resume') ? 'active' : '' }}"><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
								<li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
								<li><a href="{{action('PostsController@index') }}">Posts<a></li>
							</ul>

							<ul class="nav navbar-nav navbar-right">
					          <li>
					            <a href="https://github.com/iandresabad">
					              <i class="fa fa-github-square fa-2x"></i>
					            </a>
					          </li>
					         <!--  <li>
					            <a href="http://www.facebook.com/">
					              <i class="fa fa-facebook-square fa-2x"></i>
					            </a>
					          </li> -->
					          <!-- <li>
					            <a href="http://www.twitter.com/">
					              <i class="fa fa-twitter-square fa-2x"></i>
					            </a>
					          </li> -->
					          <li>
					            <a href="Linkedin.com/in/ivanandresabad">
					              <i class="fa fa-linkedin-square fa-2x"></i>
					            </a>
					          </li>
					          <li>
					            <a href="mailto: iandresabad@yahoo.com">
					              <i class="fa fa-envelope fa-2x"></i>
					            </a>
					          </li>
			          	  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end navbar -->
	@if (Session::has('succesMessage'))
		<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
		<div clas="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	@yield('content')
	<nav class="footer">
	  <div>
	    <footer class="footer">
	        <p><a href="#">&nbsp;Back to top</a></p>
	        <p>&nbsp;&copy; 2014 Ivan Andres Abad All rights reserved.</p>
	    </footer>
	  </div>
	</nav>

    <link href="/js/jquery.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/css/bootstrap-3.1.1/js/bootstrap.min.js"></script>
    <script src="/css/bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	@yield('bottom-script')
</body>
</html>