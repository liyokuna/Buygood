<!DOCTYPE HTML>
<html>
<head>
<title>Buy Good </title>
<link href="{{ url('css/style.css') }}" rel="stylesheet">
<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('css/fwslider.css') }}" rel="stylesheet">
<!--<link href="/assets/css/admin.css" rel="stylesheet">-->
<!-- Custom CSS -->
<!--Latest compiled and minified CSS from PureCSS-->
<link rel="stylesheet" href="{{ url('css/pure-min.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<!--start slider -->


<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/fwslider.js') }}"></script>
<link  rel="icon" href="{{ url('pictures/15_Cart.png') }}" type="image/png" />
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="#"><img src="{{ url('pictures/15_Cart.png') }}" alt="cart" style="height:50px"/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="{{ url('images/nav.png') }}" alt="nav" /></a>
						    <ul class="nav" id="nav">
							@if (Route::has('login'))
                  			 	 @if (Auth::check())
								<li><a href="{{ url('/buygood') }}">Shop</a></li> 							
								<li><a href="{{ url('auth/logout') }}">Log Out</a></li> 
                   			 	@else
                        		<li><a href="{{ url('/login') }}">Shop</a></li>  
                        		<li><a href="{{ url('/register') }}">Register</a></li> 
                    			@endif
           					 @endif
                            </ul>
							<script type="text/javascript" src="{{url('js/responsive-nav.js')}}"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	      </div>
		 </div>
	    </div>
	</div>
	
	<div>
	<!-- start slider -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{url('images/slider1.jpg')}}" alt="plate" width="1400" height="345">
      </div>

      <div class="item">
        <img src="{{url('images/slider2.jpg')}}" alt="lion" width="1400" height="345">
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
	</div>
	</div>
    <!--/slider -->
    </div>
	  
	  <div class="main">
		<div class="content-top">
			<h2>Top sales</h2>
			<p>See what other people wanted the most!</p>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo1">
				<li><img src="{{ url('images/board1.jpg') }}" /></li>
				<li><img src="{{ url('images/board2.jpg') }}" /></li>
				<li><img src="{{ url('images/board3.jpg') }}" /></li>
				<li><img src="{{ url('images/board4.jpg') }}" /></li>
				<li><img src="{{ url('images/board5.jpg') }}" /></li>
			</ul>
		<h3>It's Time to get what you want</h3>

		<script type="text/javascript" src="{{url('js/jquery.flexisel.js')}}"></script>
		</div>
	</div>
	  <div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="footer_box">
					<h4>Products</h4>
					<li><a href="#">Shop</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul class="footer_box">
					<h4>About</h4>
					<li><a href="#">L'équipe</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul class="footer_box">
					<h4>Service Client</h4>
					<li><a href="#">Contactez-nous</a></li>
					<li><a href="#">Envoie et Suivi de Colis</a></li>
					<li><a href="#">Garantie</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<ul class="footer_box">
					<h4>Social Network</h4>
					<ul class="social">	
					  <li class="facebook"><a href="#"><span> </span></a></li>
					  <li class="twitter"><a href="#"><span> </span></a></li>
					  <li class="instagram"><a href="#"><span> </span></a></li>	
					  <li class="pinterest"><a href="#"><span> </span></a></li>	
					  <li class="youtube"><a href="#"><span> </span></a></li>										  				
					</ul>
					
				</ul>
			</div>
		</div>
		<div class="row footer_bottom">
			<div class="copy">
			   <p>© 2017 Template by Buygood Team</a></p>
			</div>
		</div>
	</div>
</div>
</body>	
</html>