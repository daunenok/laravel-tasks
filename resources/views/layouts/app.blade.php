<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
</head>
<body>
<div class="container">
	<div class="authen">
		@if (Auth::guest())
		    <a href="{{ route('login') }}">Login</a>
		    &nbsp;&nbsp;&nbsp;&nbsp;
		    <a href="{{ route('register') }}">Register</a>
		@else
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			    {{ csrf_field() }}
		    </form>
		@endif
	</div>
	@yield("content")
</div>
</body>
</html>

