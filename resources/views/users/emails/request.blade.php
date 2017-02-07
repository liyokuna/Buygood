@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Contact <small>» Nous avons hâte de vous répondre au plus vite</small></h3>
      </div>
    </div>
</div>
<br>
<div class="container" style="margin-bottom:3px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"> Veuillez renseigner les informations ci-dessous </h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="POST"
                  action="/emails">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">

              @include('emails._form')

              <div class="form-group">
                <div class="col-md-7">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-save"></i>
                      Envoyer
                  </button>				
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
<br>
@endsection