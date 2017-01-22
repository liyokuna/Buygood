<div class="form-group">
  <label for="name" class="col-md-3 control-label">
    Prénom
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="name"
           id="name" value="{{ $name }}">
  </div>
</div>

<div class="form-group">
  <label for="lastname" class="col-md-3 control-label">
    Nom
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="lastname"
           id="lastname" value="{{ $lastname }}">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Email
  </label>
  <div class="col-md-8">
    <input type="email" class="form-control" name="email"
           id="email" value="{{ $email }}">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Adresse
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="street"
           id="street" value="{{ $street }}">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Complémentaire
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="extrainfo"
           id="extrainfo" value="{{ $extrainfo }}">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Code postal
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="postalcode"
           id="postalcode" value="{{ $postalcode }}">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Ville
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="city"
           id="city" value="{{ $city }}">
  </div>
</div>