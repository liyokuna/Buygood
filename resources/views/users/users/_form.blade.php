<div class="form-group">
  <label for="name" class="col-md-3 control-label">
    Type de Compte
  </label>
  <div class="col-md-8">
	<label class="radio-inline"><input type="radio" name="type" value="admin" @if($type=="admin")checked @endif> Administrateur</label>
	<label class="radio-inline"><input type="radio" name="type" value="users" @if($type=="users") checked @endif>Utilisateur</label>
  </div>
</div>