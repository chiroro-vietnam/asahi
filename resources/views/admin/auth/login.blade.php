@extends('admin')

@section('content')
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="container">
	<section id="content">
		<form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.auth.login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h1>Admin Login</h1>
			<div>
			    @if ($message = Session::get('success'))
			    <div class="alert alert-danger alert-block">
			      <button type="button" class="close" data-dismiss="alert">&times;</button>
			      {{ $message }}
			    </div>
			    @endif
			<div>
				<input type="text" placeholder="User ID" id="username" name="email" autofocus/>
			</div>
			<div>
				<input type="password" placeholder="Password" id="password" name="password" />
			</div>
			<div>
				<input class="button blue" type="submit" value="Log in" />
			</div>
		</form><!-- form -->		
	</section><!-- content -->
</div><!-- container -->
</body>
@endsection
