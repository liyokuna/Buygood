
<div class="form-group">
  <label for="id_commande" class="col-md-3 control-label">
	Référence Panier
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="id_commande"
           id="id_commande" value="{{ $id_commande }}" disabled>
  </div>
</div>

<div class="form-group">
  <label for="id_user" class="col-md-3 control-label">
    Référence Utilisateur
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="id_user"
           id="id_user" value="#{{ $id_user }}" disabled>
  </div>
</div>

<div class="form-group">
  <label for="prix" class="col-md-3 control-label">
    Prix Total
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="prix"
           id="prix" value="{{ $prix }}" disabled>
  </div>
</div>


<div class="form-group">
  <label for="etat" class="col-md-3 control-label">
    Etat de la validation
  </label>
  <div class="col-md-8">
	<label class="radio-inline"><input type="radio" name="etat" value="0" @if(!$etat)checked @endif>En attente</label>
	<label class="radio-inline"><input type="radio" name="etat" value="1" @if($etat) checked @endif>Expedié</label>
  </div>
</div>