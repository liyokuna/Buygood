
<div class="form-group">
  <label for="nom" class="col-md-3 control-label">
    Nom
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="nom"
           id="nom" value="{{ $nom }}">
  </div>
</div>

<div class="form-group">
  <label for="prix" class="col-md-3 control-label">
    Prix
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="prix"
           id="prix" value="{{ $prix }}">
  </div>
</div>

<div class="form-group">
  <label for="stock" class="col-md-3 control-label">
    Stock
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="stock"
           id="stock" value="{{ $stock }}">
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-md-3 control-label">
    Description
  </label>
  <div class="col-md-8">
    <textarea class="form-control" id="body" name="description" rows="4" placeholder="Description" value="{{ $description }}">{{ $description }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="photo" class="col-md-3 control-label">
    Photo Principal
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="photo"
           id="photo" value="{{ $photo }}">
  </div>
</div>