@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Client <small>» Liste des vos commandes sur BuyGood</small></h3>
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
				<th>Etat</th>
				<th>Prix Total</th>
				<th>Date de création</th>
				<th>Dernière mise à jour</th>
				<th>Action</th>
			</tr>
			</thead>
		<tbody>
		@foreach($commandes as $commande)
			<tr>
				<td>{{$commande->id_commande}} </td>
				<td>@if($commande->etat)
				<span class="label label-danger">Expediée</span>
				@else
					<span class="label label-warning">Validation En Attente</span>
				@endif
				</td>
				<td>{{ $commande->prix }} Euro</td>
				<td>{{ $commande->created_at }}</td>
				<td>{{ $commande->updated_at }}</td>
				<td>
					<a href="/users/commandes/{{$commande->id_commande}}" class="btn btn-info btn-xs " role="button">Voir</a>
				</td>
			</tr>
		@endforeach
		</tbody>
		</table>
	</div>
	</div>

<br>
@stop