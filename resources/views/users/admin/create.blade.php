@extends('users.layouts.layout')

@section('content')
<br><br>
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Produits <small>» Créer un nouveau produit</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text">L'article</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST"
                  action="/users/produits">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('users.admin._form')
			  
              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="glyphicon glyphicon-send"></i>
                     Submit
                  </button>
				  
				<i class="fa fa-undo" style="margin-left:7px;"></i><a href="/users/produits" >
					 Go Back
				</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop