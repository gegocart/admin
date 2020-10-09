<html>
 <head>
 	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/app.css') }}" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{url('js/canvasjs.min.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-light"> 
<!-- header start -->
<div id="app">  

<!-- header end -->
<!-- main section start -->
<div class="main">
	<div class="flex flex-col lg:flex-row mx-2">

			@yield('content')
	</div>
</div>
</div>

<!-- main section end -->

<script>
	function show_menu() {
		if($('.menu-open').hasClass('hidden'))
		{
			$('.menu-open').removeClass('hidden').addClass('block');
		}
		else 
		{
			$('.menu-open').removeClass('block').addClass('hidden');
		}
	}
</script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{url('js/canvasjs.min.js')}}"></script>
</body>
</html>