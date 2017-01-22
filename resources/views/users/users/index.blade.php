@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Utilisateurs <small>»  Liste Des Utilisateurs</small></h3>
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
	<div class="row">
		<div class="panel-group">
		@foreach ($users as $user)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse{{$user->id }}">{{$user->name }} {{$user->lastname }} <span class="badge">1</span></a>
					</h4>
				</div>
				<div id="collapse{{$user->id }}" class="panel-collapse collapse">
					<div class="panel-body">
					<dl >
						<dt>Prénom</dt>
						<dd>{{$user->name}}</dd>
						<dt>Nom</dt>
						<dd>{{$user->lastname}}</dd>
						<dt>Rue</dt>
						<dd>{{$user->street}}</dd>
						<dt>Informations complémentaires</dt>
						<dd>{{$user->extrainfo}}</dd>
						<dt>Code Postal</dt>
						<dd>{{$user->postalcode}}</dd>
						<dt>Ville</dt>
						<dd>{{$user->city}}</dd>
						<dt>Email</dt>
						<dd>{{$user->email}}</dd>
						<dt>Type d'utilisateur</dt>
						<dd>{{$user->type}}</dd>
						<a href="/users/userlist/{{$user->id}}/edit" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-send"> Modifier Type de Compte</a>
					</dl>
					<a href="{{$user->email}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-send"> Envoyer Mèl</a>
					</div>
					<div class="panel-footer">
					<ul class="nav nav-pills" role="tablist">
						<li role="presentation"><a href="#">Historique Des Commandes <span class="badge">3</span></a></li>
						<li role="presentation"><a href="#">Commande En Attente <span class="badge">1</span></a></li>
						<li role="presentation"><a href="#">Commande Expediée <span class="badge">2</span></a></li>
					</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
    </div>
  </div>
<br>
@stop