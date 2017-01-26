@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Utilisateur <small>» Liste des utilisateurs BuyGood</small></h3>
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
	@foreach($users as $user)
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$user->id}}" aria-expanded="true" aria-controls="collapse{{$user->id}}">
		{{$user->name}} {{$user->lastname}} <a href="#">Commande en Attente <span class="badge">3</span></a><br>
		</a>
		</h4>
		</div>
		<div id="collapse{{$user->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-body">
			<dl >
				<dt>Name</dt>
				<dd>{{$user->name}}</dd>
				<dt>Lastname</dt>
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
				<dd> {{$user->email}}
				<a href="mailto:{{$user->email}}?Subject=BuyGood%20Informations" class="btn btn-info" role="button"><span class="glyphicon glyphicon-send"> Envoyer Mèl</a>
				</dd>
				<dt>Type</dt>
				<dd>{{$user->type}}</dd>
				<a href="/users/userslist/{{$user->id}}/edit" class="btn btn-warning" role="button" style=""><span class="glyphicon glyphicon-edit"> Modifier</a>
				<button type="button" class="btn btn-danger btn-md text-right" data-toggle="modal" data-target="#modal-delete"><span class="glyphicon glyphicon-remove"> Supprimer Compte
				</button>
			</dl>
		</div>
		<div class="panel-footer">
				<a href="#">Commandes <span class="badge">5</span></a>
			
				<a href="#">Commandes Expediées <span class="badge">3</span></a>
			
				<a href="#">Commandes en attente <span class="badge">2</span></a>
		</div>
		</div>
		</div>
		</div>
		@endforeach
		</div>
	
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-4 form-group">
			<a class="btn btn-info btn-link" href="/buygood" role="button"><span class="glyphicon glyphicon-menu-left"> Go back</a>
		</div>		
	</div>
</div>
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
            Est-vous sûr de vouloir supprimer votre compte?
          </p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="/user/identite/{{ $user->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
<br>
@stop