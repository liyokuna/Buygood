@extends('users.layouts.layout')
@section('content')
<br>
<br>
  <div class="container">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Administrateur <small>» Modifier la commande</small></h3>
      </div>
    </div>
</div>
<br>
<div class="container" style="margin-bottom:3px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Commande {{$id}} </h3>
          </div>
          <div class="panel-body">


            <form class="form-horizontal" method="POST"
                  action="/users/commandes/{{$id}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{ $id }}">

              @include('users.commandes._form')

              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-save"></i>
                      Save Changes
                  </button>
				
				<i class="fa fa-undo" style="margin-left:7px;"></i><a href="/users/commandes" >
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
</div>

 <br>
@stop