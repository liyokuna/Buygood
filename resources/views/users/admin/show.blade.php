@extends('users.layouts.layout')

@section('content')
<br><br><br>
    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="thumbnail">
					
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							<div class="item active">
							  <img style='margin: 0 auto;' class="img-responsiveenter-block" src="/photos/{{$photo}}" alt="{{$nom}}" width="460" height="345">
							</div>
							<div class="item">
							  <img src="/photos/" alt="..." width="460" height="345" >
							</div>
							<div class="item">
								<img src="/photos/" alt="..." width="460" height="345" >
							</div>
							<div class="item">
								<img src="/photos/" alt="..." width="460" height="345">
							</div>
						  </div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
                    <div class="caption-full">
                        <h4 class="pull-right">{{$prix}} Euro</h4>
                        <h4><a >{{$nom}}</a>
                        </h4>
						<h4> <a>Nombre en Stock 
						@if($stock <=5)
							<span class="label label-danger">{{ $stock }}</span>
						@else
							<span class="label label-info">{{ $stock }}</span>
						@endif
						</a>
						</h4>
						<br><hr>
                        <p>{{$description}}</p>
						<br>
						<div class="text-right">
							<a class="btn btn-success" href="#">Ajouter au Panier</a>
						</div>
                    </div>
					<br>
                    <div class="ratings">
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
					
                </div>
            </div>

            </div>
			
			<div>
			
			
			
			</div>

        </div>

    </div>
@stop