@extends('users.layouts.layout')

@section('content')
<br><br>
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Produits <small>» Ajouter des photos à votre produit</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text">Photos</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST"
                  action="/users/photos">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

			  	<div class="form-group">
				<label for="id_items" class="col-md-3 control-label">Articles</label>
				<div class="col-md-8">
					<select class="form-control" id="id_items" name="id_items">
						@foreach( $items as $item )
							<option value="{{ $item->id }}">{{ $item->nom }}</option>
						@endforeach
					</select>
				</div>
			</div>
			  
              @include('users.admin.photo._form')
			  
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