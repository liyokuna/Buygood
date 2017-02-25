@extends('users.layouts.layout')
@section('content')
<br><br>
<meta id="token" name="token" content="{{csrf_token()}}">
<div class="container">
    <div class="row page-title-row">
		<div class="col-md-6">
			<h3>Client <small>» Votre panier BuyGood</small></h3>
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
				<th>Article</th>
				<th>Prix Unitaire</th>
				<th>Quantité</th>
				<th>Prix</th>
				<th>Action</th>
			</tr>
			</thead>
		<tbody>
		@foreach($indexs as $index)
			<tr>
				<td>{{ $index['nom'] }}</td>
				<td> {{ $index['prix'] }} &#8364 </td>
				<td> <input id="quantifier-{{$index['id']}}" type="number" name="quantite" min="1" max="10" value="1" onload="calculationTotal({{$index['id']}})" onchange="calculation(this.value,{{$index['prix']}},{{$index['id']}})"/> </td>
				<td><p id="prixT-{{$index['id']}}">{{$index['prix']}} </p>&#8364</td>
				<td>
					<a href="/users/produits/{{$index['id']}}" class="btn btn-info btn-xs " role="button">Voir</a>
					<a href="panier/{{$index['id']}}" class="btn btn-warning btn-xs " role="button">Supprimer</a>
				</td>
			</tr>
		@endforeach
		</tbody>
		</table>
	</div>

	<script>
        var prix=[];
        var validation=[];
        var sum;
        function calculationTotal(t){
            var val = document.getElementById("prixT-".concat(t)).innerHTML;
            var quantifier = document.getElementById("quantifier-".concat(t)).value;
			prix[t]=Number(val);
			validation[t]=Number(quantifier);
            var count=prix.reduce((a,b)=> a + b,0);
            sum=count;
            return count;
        }

        function calculation(q,p,t) {
            var total = q*p;
            document.getElementById("prixT-".concat(t)).innerHTML = total;
           	delete prix[t];
            delete validation[t];
            show(calculationTotal(t));
        }
	</script>
	<hr>
	<div class="row" >
		<div class="col-sm-4 text-left">
			<h2>Prix Total: </h2>
		</div>
		<div class="col-sm-4">
			@foreach($indexs as $index)
				<script>calculationTotal({{$index['id']}})</script>
			@endforeach
			<h2 id="prixTotal"><script>document.write(sum);</script></h2>
			<h2>&#8364</h2>
		</div>
		<div class="col-sm-4 text-right">
			<button  id="validation" class="btn btn-info" role="button" onclick="valider()">Valider</button>
		</div>
	</div>
	</div>
	<script>
        function show(e){
            document.getElementById("prixTotal").innerHTML = sum;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });
        function valider() {
            document.getElementById("validation").disabled = true;
            var plat =[];
           for(var i = 0; i<validation.length;i++){
                if(!(validation[i]==undefined))
                    plat[i]=i;
			}
            validation=validation.filter(function(n){ return n != undefined });
            plat=plat.filter(function(n){ return n != undefined });
            var datas=plat.concat(validation);
			$.ajax("valider",
				{
				type: 'POST',
				data: {ids:JSON.stringify({ ids:datas })},
				success:function(response)
				{
					if ( response.status == 'ok' )
						window.location.replace(response.url);
				}
                });
		}
	</script>

<br>

@stop