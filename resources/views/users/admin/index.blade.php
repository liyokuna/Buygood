@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Administrateur <small>» Liste des articles BuyGood</small></h3>
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
		<table class="table table-condensed table-responsive table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Description</th>
				<th>Stock</th>
				<th>Prix</th>
				<th>Photo</th>
				<th>Date de création</th>
				<th>Dernière mise à jour</th>
				<th>Action</th>
			</tr>
			</thead>
		<tbody>
		@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->nom }}</td>
				<td>{{ $product->description }}</td>
				<td>@if($product->stock <=5)
				<span class="label label-danger">{{ $product->stock }}</span>
				@else
					<span class="label label-info">{{ $product->stock }}</span>
				@endif
				</td>
				<td>{{ $product->prix }}</td>
				<td>{{ $product->photo }}</td>
				<td>{{ $product->created_at }}</td>
				<td>{{ $product->updated_at }}</td>
				<td>
				
					<a href="/users/produits/{{$product->id}}" class="btn btn-info btn-xs " role="button">Voir</a>
					<a href="/users/produits/{{$product->id}}/edit" class="btn btn-warning btn-xs " role="button">Editer</a>
					<a href="/users/photos/{{$product->id}}" type="button" class="btn btn-info btn-xs  " ><span class="glyphicon glyphicon-plus"> Photos</a>
					<button type="button" class="btn btn-danger btn-xs  " data-toggle="modal" data-target="#modal-delete"><span class="glyphicon glyphicon-remove"> Supprimer</button>
				</td>
			</tr>
			{{-- Confirm Delete --}}
			<div class="modal fade" id="modal-delete" tabIndex="-1">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">
					×
				  </button>
				  <h4 class="modal-title">Veuillez Confirmer</h4>
				</div>
				<div class="modal-body">
				  <p class="lead">
					<i class="fa fa-question-circle fa-lg"></i>  
					Est-vous sûr de vouloir supprimer cet article ?
				  </p>
				</div>
				<div class="modal-footer">
				  <form method="POST" action="/users/produits/{{ $product->id }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE">
					<button type="button" class="btn btn-default"
							data-dismiss="modal">Fermer</button>
					<button type="submit" class="btn btn-danger">
					  <i class="fa fa-times-circle"></i> Oui
					</button>
				  </form>
				</div>
			  </div>
			</div>
			</div>
		@endforeach
		</tbody>
		</table>
	</div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-lg-4 form-group">
			<a class="btn btn-defalut btn-link" href="/buygood" role="button"><span class="glyphicon glyphicon-menu-left"> Go back</a>
		</div>		
		
		<div class="col-lg-4 form-group col-lg-offset-4 text-right">
			<a class="btn btn-info btn-link" href="/users/produits/create" role="button"><span class="glyphicon glyphicon-plus"> Nouveau Article</a>
		</div>	
	</div>
</div>



<br>
@stop