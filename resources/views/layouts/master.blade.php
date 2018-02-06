<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X6UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-witdh, initial-scale=1">
		<title>Post</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<div class="container">
      <div class="row">
          <h1 class="col-md-offset-7 col-md-5 pull-right">Formations/Stages</h1>
      </div>
			<div class="row">
				<div class="col-sm-6">
					@include('partials.menu')
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
          <div class="col-sm-8">
            @yield('content')
          </div>
          <div class="col-sm-4">
            @include('partials.search')
          </div>
        </div>
			</div>
      <div class="row">
				<div class="col-sm-6">
					@include('partials.menu')
				</div>
			</div>
		</div>
		<script src="{{asset('js/app.js')}}"></script>
	</body>
</html>
