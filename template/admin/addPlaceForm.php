<div class="row">
  <form class="col s12" action="index.php" method="post">
    <input type="hidden" name="<?php echo $field; ?>" value="<?php echo $value; ?>">
    <input type="hidden" name="action" value="addPlace">
    <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">
    <input type="hidden" name="project" value="<?php echo $project; ?>">

    <div class="row">
      <div class="input-field col s6">
        <input id="name" type="text" name="name" class="validate" value="<?php if (isset($data)) {
          echo $data['name'];
        } ?>" required>
        <label for="name">Ime mjesta</label>
      </div>
      <div class="input-field col s6">
        <input id="address" type="text" name="address" class="validate" value="<?php if (isset($data)) {
          echo $data['address'];
        } ?>" required>
        <label for="address">Adresa</label>
      </div>
    </div>

    <input id="imageUrl" name="imageUrl" type="hidden" class="validate" value="null">

    <div class="row">
      <div class="input-field col s12">
        <p>Opis mjesta</p>
        <textarea id="content" name="description" class="materialize-textarea" required><?php if (isset($data)) {
            echo $data['description'];
          } ?></textarea>
      </div>
    </div>
    <p>Kada stisnete Dodaj, ovo mjesto će postati <b>javno vidljivo svima</b> kao dio <b>trenutnog projekta</b>. Sva
      polja su obavezna.</p>

    <button class="btn waves-effect waves-light" type="submit">Dodaj
      <i class="mdi-content-send right"></i>
    </button>
  </form>
</div>
