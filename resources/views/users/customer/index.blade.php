@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Clients <small>» Liste des articles Disponibles Chez BuyGood</small></h3>
		</div>
    </div>
</div>


<div class="container">
@if (Session::has('success'))
    <div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> &nbsp;
        </strong>
        {{ Session::get('success') }}
    </div>
@endif
</div>

<div class="container">
@if (count($errors) > 0)
    <div class="alert alert-warning fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> &nbsp;
        </strong>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
@endif
</div>

<div class="container">

	<div class="row">
	@foreach($products as $product)
		<div class="col-lg-3 col-md-4 col-xs-6 ">
			<div class="thumbnail">
			<a href="/users/produits/{{$product->id}}">
				<img class="img-responsive img-thumbnail img-rounded" src="/photos/{{$product->photo}}"  alt="{{$product->nom}}" width="400" height="300">
				<div class="caption">
					<p>{{$product->nom}} à {{$product->prix}} Euros</p>
				</div>
			</a>
			</div>
		</div>
	@endforeach
		</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-4 form-group">
			<a class="btn btn-info btn-link" href="/buygood" role="button"><span class="glyphicon glyphicon-menu-left"> Go back</a>
		</div>		
	</div>
</div>

<br>
@stop