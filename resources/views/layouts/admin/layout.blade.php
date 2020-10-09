<html>
 <head>
 	   <meta name="csrf-token" content="{{ csrf_token() }}">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/app.css') }}" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{url('js/canvasjs.min.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">


  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</head>

<body class="bg-light"> 
<!-- header start -->
<div id="app">  
<div class="flex justify-between items-center header-wrapper py-4 px-3  bg-white fixed w-full">
<div class="block lg:hidden menu-click">
    <button class="flex items-center px-3 py-2 focus:outline-none" onclick="show_menu()">
      <img src="{{url('images/icons_1/menu.svg')}}" class="w-5 h-5">
    </button>
    </div>
<div class="flex items-center">

<div><img src="{{url('images/gegocart-logo.png')}}" class="w-32"></div>
   
    <div class="mx-2 hidden lg:block">
		<form class="mb-0">
		<div class="relative">
		<img src="{{url('images/search.svg')}}" class="w-4 h-4 absolute m-2">
			<!-- <input type="text" placeholder="Search" class="border pl-8 pr-2 py-1 rounded text-sm"> -->
			</div>
		</form>
		</div>
    </div>
		<div class="relative  lg:bg-transparent">
		<ul class="list-reset flex flex-row leading-loose items-center">
			<li class="mx-3"><a href="{{url('/admin/changepassword')}}" class="text-xs">Change Password</a></li>
		<li><a href="{{url('/logout')}}" class="text-xs flex items-center"><img src="{{url('images/icons_1/logout.svg')}}" class="w-3 h-3"><span class="mx-1 lg:block hidden">Logout</span></a></li>
		<!-- <li><img src="images/icons_1/bell.svg" class="w-4 h-4"></li> -->
		</ul>
		</div>
		</div>
<!-- header end -->
<!-- main section start -->
<div class="main">
		<div class="flex flex-col lg:flex-row">
	 @include('layouts.admin.sidebar')
	 <div class="w-full mt-16 ml-32 lg:ml-auto">
		<div class="px-3 py-3 lg:px-5 lg:py-5">
	 @yield('content')
	</div>
</div>
	</div>

</div>
</div>
<!-- main section end -->

  <script src="{{ asset('js/app.js') }}" ></script>
  <script src="{{url('js/canvasjs.min.js')}}"></script>

 
  
<script>
	
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	/*title: {
		text: "Monthly Sales Data"
	},*/
	axisX: {
		valueFormatString: "MMM"
	},
	axisY: {
		prefix: "$",
		labelFormatter: addSymbols
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
	{
		type: "column",
		name: "Actual Sales",
		showInLegend: true,
		xValueFormatString: "MMMM YYYY",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2019, 0), y: 20000 },
			{ x: new Date(2019, 1), y: 30000 },
			{ x: new Date(2019, 2), y: 25000 },
			{ x: new Date(2019, 3), y: 70000, indexLabel: "High Renewals" },
			{ x: new Date(2019, 4), y: 50000 },
			{ x: new Date(2019, 5), y: 35000 },
			{ x: new Date(2019, 6), y: 30000 },
			{ x: new Date(2019, 7), y: 43000 },
			{ x: new Date(2019, 8), y: 35000 },
			{ x: new Date(2019, 9), y:  30000},
			{ x: new Date(2019, 10), y: 40000 },
			{ x: new Date(2019, 11), y: 50000 }
		]
	}, 
	
	{
		type: "area",
		name: "Profit",
		markerBorderColor: "white",
		markerBorderThickness: 2,
		showInLegend: true,
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2019, 0), y: 5000 },
			{ x: new Date(2019, 1), y: 7000 },
			{ x: new Date(2019, 2), y: 6000},
			{ x: new Date(2019, 3), y: 30000 },
			{ x: new Date(2019, 4), y: 20000 },
			{ x: new Date(2019, 5), y: 15000 },
			{ x: new Date(2019, 6), y: 13000 },
			{ x: new Date(2019, 7), y: 20000 },
			{ x: new Date(2019, 8), y: 15000 },
			{ x: new Date(2019, 9), y:  10000},
			{ x: new Date(2019, 10), y: 19000 },
			{ x: new Date(2019, 11), y: 22000 }
		]
	}]
});
chart.render();

function addSymbols(e) {
	var suffixes = ["", "K", "M", "B"];
	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

	if(order > suffixes.length - 1)                	
		order = suffixes.length - 1;

	var suffix = suffixes[order];      
	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}

</script>
<!--   <script>
$(document).ready(function(){
  $(".menu-click").click(function(){
    $(".menu-open").toggle();
  });
});
</script> -->
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

@stack('scripts')
  <!-- end app div  --> 
</body>
</html>