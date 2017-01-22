<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="col-md-4 control-label text">Mot de passe</label>

	<div class="col-md-6">
	@if($type == 'admin')
		<div class="radio">
		  <label><input type="radio" name="optradio" checked>Administrateur</label>
		</div>
	@else
		
		<div class="radio">
		  <label><input type="radio" name="optradio" checked>Administrateur</label>
		</div>
	@endif
	@if($type == 'users')
		<div class="radio">
		  <label><input type="radio" name="optradio" checked>Utilisateur</label>
		</div>
	@else
		<div class="radio">
		  <label><input type="radio" name="optradio">Utilisateur</label>
		</div>
	@endif
	</div>
	</div>
</div>
