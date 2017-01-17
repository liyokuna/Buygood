 <!DOCTYPE html>
 <html lang="fr">
 
 <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link  rel="icon" href="{{ url('pictures/15_Cart.png') }}" type="image/png" />
	
	<title>Buygood</title>
	
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<!--<link href="/assets/css/admin.css" rel="stylesheet">-->
	<!-- Custom CSS -->
	<!--Latest compiled and minified CSS from PureCSS-->
	<link rel="stylesheet" href="{{ url('css/pure-min.css') }}">
	<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
	@yield('styles')

	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	
	<!--[if lt IE9]>
	<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>
<style>
body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8em;
    color: #fffff;
}
.bg-grey
{
	background-color: #b3b3b3;
	text-shadow: 0.4px 0.4px;
}
.container-fluid {
    margin-right: auto;
    margin-left: auto;
}
.navbar {
    font-size: 13.5px;
    letter-spacing: 2.5px;
    border-radius: 0;
	font-family: Montserrat, sans-serif;
}
.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #666699 !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}


.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #666699;
}

.carousel-indicators li {
    border-color: #666699;
}

.carousel-indicators li.active {
    background-color: #666699;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}
.pure-menu-link, .copyright{
	color:#0f0b0c;
}
footer{
	
    padding-top: 8%; 
    margin-bottom: 0;
    bottom: 0;
    width: 100%;
}
/*effects*/
#empowered-logo:hover,#talk:hover,#search:hover, #world-map:hover {
	font-family: Font-1;
	src: url(fonts/sansation_bold.woff);
	font-weight: bold;
}
#you:hover, #internship:hover, #trip:hover, #about:hover{
	font-family: Font-1;
	src: url(fonts/sansation_light.woff);
}

#empowered-logo, #talk, #search, #world-map {
	/*-webkit-transition: width 2s, height 2s; /* Safari */
    transition: width 2s, height 2s;
	-webkit-transition-timing-function: ease;*/
	font-family: Font-1;
}
@font-face {
   font-family: Font-1;
   src: url(/fonts/sansation_light.woff);
}
/*Modal credits*/
 .modal-header {
      background-color: #b3b3b3;
      color:0f0b0c !important;
      text-align: center;
	  font-family: Font-1;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #b3b3b3;;
  }
  .modal-body{
	 font-family: Font-1; 
  }
  .text{
	font-family: Font-1;
    font-size: 20px;
	color:#0f0b0c;
}

.center{
	font-family: Font-1;
	position: absolute;
    left: 0;
    top: 25%;
    width: 100%;
    text-align: center;
    font-size: 18px;
	color:#808080;
}
#image_bg{
	/*position:relative;*/
	margin-bottom:auto;
	margin-left:auto;
	margin-right:auto;
}
.transparent{    
    background-color: rgba(0,0,0,0.15)!important;
}

.panel{
    background-color: transparent;
}
.form-control, #header{
	background-color: rgba(0,0,0,0.15)!important;
}

</style>
<body data-spy="scroll" data-target=".navbar">

{{-- Navigation Bar --}}

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" 
				data-toggle="collapse" data-target="#navbar-menu">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/home">
			<img alt="brand" src="{{URL::asset('/pictures/15_Cart.png')}}" style="width:35px;height:35px;margin-top:-8px">
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="navbar-menu">
		@include('users.headerfooter.partials.navbar')
		</div>
	</div>
</nav>

@yield('content')

@include('users.headerfooter.partials.footer')
</body>
</html>