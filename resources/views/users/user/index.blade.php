@extends('users.layouts.layout')
@section('content')

<br><br>
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Profile <small>» Edit or View Your Credentials</small></h3>
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
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
				  <h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" 
aria-controls="collapseOne">
					  Identités
					</a>
				  </h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				  <div class="panel-body">
					<dl >
						<dt>Name</dt>
						<dd>{{$credentials->name}}</dd>
						<dt>Lastname</dt>
						<dd>{{$credentials->lastname}}</dd>
					</dl>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
				  <h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" 
aria-expanded="false" aria-controls="collapseTwo">
					  Adresse
					</a>
				  </h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				  <div class="panel-body">
					<dl>
						<dt>Rue</dt>
						<dd>{{$credentials->street}}</dd>
						<dt>Informations complémentaires</dt>
						<dd>{{$credentials->extrainfo}}</dd>
						<dt>Code Postal</dt>
						<dd>{{$credentials->postalcode}}</dd>
						<dt>Ville</dt>
						<dd>{{$credentials->city}}</dd>
					</dl>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
				  <h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" 
aria-expanded="false" aria-controls="collapseThree">
					 Login
					</a>
				  </h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				  <div class="panel-body">
					<dl>
						<dt>Email</dt>
						<dd>{{$credentials->email}}</dd>
					</dl>
					<a href="/users/mdp/{{$credentials->id}}/edit" class="btn btn-warning" role="button"><span 
class="glyphicon glyphicon-edit"> Modifier mot de passe</a>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
				  <h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" 
aria-expanded="false" aria-controls="collapseFour">
					  Moyen de Paiment
					</a>
				  </h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				  <div class="panel-body">
					<dl>
						<dt>Paypal</dt>
						<dd><a href="/users/payment/#" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-edit"> Modifier</a></dd>
					</dl>
				  </div>
				</div>
			  </div>
			  
			</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-4 form-group">
			<a class="btn btn-info btn-link" href="/buygood" role="button"><span class="glyphicon glyphicon-menu-left"> Go back</a>
		</div>
		
		<div class="col-lg-4 form-group">
			<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete"><span class="glyphicon glyphicon-remove"> Supprimer le compte
			</button>
		</div>
		
		<div class="col-lg-4 form-group">
			<a href="/users/identite/{{$credentials->id}}/edit" class="btn btn-warning" role="button" style=""><span class="glyphicon glyphicon-edit"> Modifier</a>
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
          <form method="POST" action="/user/identite/{{ $credentials->id }}">
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