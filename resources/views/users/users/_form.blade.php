<div class="form-group">
  <label for="name" class="col-md-3 control-label">
    Type de Compte
  </label>
  <div class="col-md-8">
	@if($type=="admin")
		<label class="radio-inline"><input type="radio" name="type" value="admin" checked> Administrateur</label>
	@else
		<label class="radio-inline"><input type="radio" name="type" value="admin" > Administrateur</label>
	@endif
	@if($type=="users")
		<label class="radio-inline"><input type="radio" name="type" value="users" checked>Utilisateur</label>
	@else
		<label class="radio-inline"><input type="radio" name="type" value="users" > Utilisateur</label>
	@endif
  </div>
</div>