@extends('users.layouts.layout')

@section('content')
<div id="image_bg">
	<img src="{{URL::asset('/pictures/welcome-12.jpg')}}" alt="clipboard" class="img-responsive" style="width:100%; height:899px";>
	<div class="center">
		<div class="container-fluid" >
			<div class="row">
				<div class="col-lg-12">
					<h1>BuyGood User Welcome !</h1>
				</div>
			</div>
				<div class="row">
					<div class="col-lg-12">
						<p>Trend Items</p>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection