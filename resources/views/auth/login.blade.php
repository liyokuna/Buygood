@extends('layouts.layout')

@section('content')
<div id="image_bg">
	<img src="{{URL::asset('/pictures/cash-register.jpg')}}" alt="clipboard" class="img-responsive" style="width:100%; height:899px";>
<div class="center">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading text">Connexion</div>
					<div class="panel-body">
						
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Adresse e-mail</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
									@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label class="col-md-4 control-label">Mot de passe</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
									@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember">Se rappeler de moi</label>
									</div>
								</div>
							</div>
							
							<div class="from-group">
								<div class="col-md-6 ">
									<a href="/register">S'enregister</button>
								</div>
								<div class="col-md-6 ">
									<button type="submit" class="btn btn-primary">Connexion</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection