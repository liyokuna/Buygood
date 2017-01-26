    <ul class="nav navbar-nav">
		@if (Auth::guest())
			<li><a href="/">Home</a></li>
		@endif
		@if (Auth::check() && Auth::user()->type=="admin")
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-task" ></span> Produits
					<span class="caret"></span>
				</a>
			
				<ul class="dropdown-menu" >
					<li><a href="/users/admin/liste"><span class="glyphicon glyphicon-th-list" ></span> Liste des produits</a></li>
				</ul>
			</li>
			
			<li class="dropdown">
			<a href="#" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-tasks" ></span> Commandes
					<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" >
				<li><a href="/users/admin/pendinglist"><span class="glyphicon glyphicon-warning-sign"></span>Commande en Attente</a></li>
				<li><a href="/users/admin/sendlist"><span class="glyphicon glyphicon-send" ></span>Commande expédiée</a></li>
				<li><a href="/users/admin/factures"><span class="glyphicon glyphicon-list" ></span>Factures</a></li>
			</ul>
			</li>
			@endif
			
			@if (Auth::check() && Auth::user()->type=="users")
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-tasks" ></span> Produits
					<span class="caret"></span>
				</a>
			
				<ul class="dropdown-menu" >
					<li><a href="/users/produits"><span class="glyphicon glyphicon-th-list" ></span> Tous les articles</a></li>
					<li><a href="/users/customer/hommes"><span class="glyphicon glyphicon-cog" ></span> Hommes</a></li>
					<li><a href="/users/customer/femmes"><span class="glyphicon glyphicon-log-out" ></span> Femmes </a></li>
					<li><a href="/users/customer/enfants"><span class="glyphicon glyphicon-log-out" ></span> Enfants </a></li>
				</ul>
			</li>
			@endif
			<li><a data-toggle="modal" data-target="#Modal-contact" href="#"><span class="glyphicon glyphicon-envolepo"></span> Contact</a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
	
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
				<li><a href="/users/customer/commandes"><span class="glyphicon glyphicon-th-list" ></span> Mes commandes</a></li>
				<li><a href="/users/identite"><span class="glyphicon glyphicon-cog" ></span> Paramètres</a></li>
				<li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out" ></span> Se déconnecter</a></li>
			</ul>
		@endif
		</li>
		<li><a href="/users/panier"><img alt="brand" src="{{URL::asset('/pictures/1Citycons_bag.png')}}" style="width:24px;height:24px;margin-top:-5px;"> Panier</a></li>
    </ul>