    <ul class="nav navbar-nav">
		@if (Auth::guest())
			<li><a href="/">Home</a></li>
		@endif
		@if (Auth::check() && Auth::user()->type=="admin")

			<li><a href="/users/produits"><span class="glyphicon glyphicon-th-list" ></span> Liste des produits</a></li>
			
			<li class="dropdown">
			<a href="#" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-tasks" ></span> Commandes
					<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" >
				<li><a href="/users/commandes"><span class="glyphicon glyphicon-warning-sign"></span>Commandes</a></li>
				<li><a href="/users/archive"><span class="glyphicon glyphicon-send" ></span>Commandes Archivées</a></li>
			</ul>
			</li>
			@endif
			
			@if (Auth::check() && Auth::user()->type=="users")
			<li><a href="/users/produits"><span class="glyphicon glyphicon-th-list" ></span> Nos articles</a></li>
			<li><a href="mailto:liyokuna@hotmail.com?Subject=Get%20In%20Touch%20With%20You"><span class="glyphicon glyphicon-envolepo"></span> Contact Us</a></li>
			@endif
			
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
	   <li><a href="/panier"><img alt="brand" src="{{URL::asset('/pictures/1Citycons_bag.png')}}" style="width:24px;height:24px;margin-top:-5px;"> Panier</a></li>
		<!-- if a normal user login -->
		
		<li class="dropdown">
		@if (Auth::check() && Auth::user()->type=="admin")
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-user" ></span> <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}
					<span class="caret"></span>
				</a>
			<ul class="dropdown-menu" >
				<li><a href="/users/produits"><span class="glyphicon glyphicon-plus" ></span> Ajouter/ Retirer un produit</a></li>
				<li><a href="/users/userslist"><span class="glyphicon glyphicon-list" ></span> Utilisateurs</a></li>
				<li><a href="/users/identite"><span class="glyphicon glyphicon-cog" ></span> Paramètres</a></li>
				<li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out" ></span> Se déconnecter</a></li>
			</ul>
		@endif
		</li>
		
		<!-- if a normal user login -->
		
		<li class="dropdown">
		@if (Auth::check() && Auth::user()->type=="users")
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-user" ></span> <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}
					<span class="caret"></span>
				</a>
			<ul class="dropdown-menu" >
				<li><a href="/users/commandes"><span class="glyphicon glyphicon-th-list" ></span> Mes commandes</a></li>
				<li><a href="/users/identite"><span class="glyphicon glyphicon-cog" ></span> Paramètres</a></li>
				<li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out" ></span> Se déconnecter</a></li>
			</ul>
		@endif
		</li>
    </ul>