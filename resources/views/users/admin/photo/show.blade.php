@extends('users.layouts.layout')

@section('content')
<br><br><br>
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <div class="thumbnail">
					<img class="img-responsive" src="/photos/{{$items->photo}}" alt="{{$items->nom}}" style="width:100%, height:50%">
                    <div class="caption-full">
					{{$items->nom}}
                    </div>
                </div>
				@if(($size <3 ))
					<a href="/users/photos/create" class="btn btn-md btn-info" role="button">Ajouter</a>
				@endif
				<a href="/users/produits" class="btn btn-md btn-default" role="button" >Retour</a>
            </div>
			
			<h3>Vous pouvez ajouter jusqu'à 3 photos pour chaque articles</h3>
			
			@foreach($photos as $photo)
			<div class="col-md-3 ">
					<div class="thumbnail">
						<img class="img-responsive" src="/photos/{{$photo->chemin}}" alt="{{$photo->chemin}}" style="width:100%, height:50%">
						<div class="caption-full">
						<a href="/users/photos/{{$photo->id}}/edit" class="btn btn-md btn-info" role="button" >Modifier</a>
						
						<form method="POST" action="/users/photos/{{ $photo->id }}" style="padding-top:2px;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="DELETE">	
							<button type="submit" class="btn btn-md btn-danger">
							  <i class="fa fa-times-circle" ></i> Supprimer
							</button>
						</form>
						</div>
					</div>
            </div>
			@endforeach
        </div>
    </div>
<br>
@stop