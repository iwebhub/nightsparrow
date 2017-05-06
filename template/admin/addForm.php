    <form class="col s12" action="index.php" method="post">
        <?php if (isset($_GET['parent'])) {
            echo '<input type="hidden" name="parent" value="' . htmlentities($_GET['parent']) . '">';
            echo 'Ova stranica će postati dijete stranice ' . htmlentities($_GET['parent']) . '.';
        } elseif (isset($data)) {
            echo '<input type="hidden" name="parent" value="' . htmlentities($data['parent']) . '">';
            echo '<input type="hidden" name="originalSlug" value="' . htmlentities($_GET['update']) . '">';
        }
        ?>
        <input type="hidden" name="<?php echo $field; ?>" value="<?php echo $value; ?>">
        <input type="hidden" name="action" value="addPage">
        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">
        <input type="hidden" name="type" value="<?php if (isset($_GET['type'])) {
            echo $_GET['type'];
        } else {
            echo 'page';
        } ?>">

        <div class="row">
            <div class="input-field col s6">
              <p class="input-desc">Naslov</p>
              <input type="text" name="title" id="search" class="search" placeholder="Naslov..."
                     onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Naslov...'"
                     onkeypress="document.getElementById('slug').value = getSlug(document.getElementById('search').value);"
                     onkeyup="document.getElementById('slug').value = getSlug(document.getElementById('search').value);"
                     value="<?php if (isset($data)) {
                       echo $data['title'];
                     } ?>"  required
                     >

            </div>
          <br><br>

        <?php if ($_GET['type'] != 'blog') {

            echo '<div class="row">
      <div class="input-field col s12">
        <label for="content" class="nslabel">Sadržaj stranice</label><br>
        <textarea id="content" name="body" class="nsinputfield materialize-textarea" required>' . $data['body'] . '
         </textarea>';
        }
        ?>
</div>
</div>
      <br><br>
<div class="row">
    <div class="input-field col s12">
        <p>Postavke stranice</p><br><br>

        <p>
            <input name="status" class="nsradio" value="0" type="radio"
                   id="public" <?php if (($data['status'] !== 1) && ($data['status'] !== 3)) {
                echo 'checked';
            } ?> />
            <label for="public" class="nslabel if">Javna</label>
        </p>

        <p>
            <input name="status" type="radio" class="nsradio" value="1" id="draft" <?php if ($data['status'] == 1) {
                echo 'checked';
            } ?> />
            <label for="draft" class="nslabel if">Skica</label>
        </p>

        <p>
            <input name="status" value="3" class="nsradio" type="radio" id="archived"<?php if ($data['status'] == 3) {
                echo 'checked';
            } ?>/>
            <label for="archived" class="nslabel if">Arhivirana</label>
        </p>


        <p>
            <input type="checkbox" class="showinnav" class="nscheckbox" name="showinnav" value="1"
                   id="showinnav" <?php if (isset($_GET['parent']) || isset($_POST['parent'])) {
                echo '';
            } elseif (!isset($data) || ($data['showinnav'] != 0)) {
                echo 'checked="checked"';
            } ?> />
            <label for="showinnav" class="nslabel if">Prikaži u navigaciji ako je stranica javna</label>
        </p>

      <p>Metapodaci</p><br><br>

      <div class="input-field col s6">

        <label for="slug" class="nslabel" id="slug-label">Kratka oznaka (slug)</label>
        <input id="slug" class="nsinputfield" type="text" name="slug" value="<?php if (isset($data)) {
          echo $data['slug'];
        } ?>" required>
      </div>
    </div>
  <div class="row">
    <div class="input-field col s12">
      <label for="summary" class="nslabel">Sažetak</label>
      <input id="summary" name="summary" class="nsinputfield" type="text" value="<?php if (isset($data)) {
        echo $data['summary'];
      } ?>">
    </div>
  </div>
  <div class="row">
    <div class="input-field col s12">
      <label for="sources" class="nslabel">Izvori (neobavezno)</label>
      <input id="sources" name="sources" type="text" class="nsinputfield" value="<?php if (isset($data)) {
        echo $data['sources'];
      } ?>">
    </div>
  </div>

        <p>Kada kliknete na <?php if (isset($data)) {
                echo 'Uredi, stranica će biti ažurirana, a starija verzija nje će biti pohranjena u bazi podataka iz sigurnosnih razloga.';
            } else {
                echo 'Dodaj, stranica će biti dodana u skladu s navedenim postavkama. Ako već postoji stranica s istom kratkom oznakom, kratka oznaka biti će adaptirana.';
            } ?></p>
        <button class="more-themes" type="submit"><?php if (isset($data)) {
                echo 'Uredi';
            } else {
                echo 'Dodaj';
            } ?>
            &rarr;</i>
    </div>
    </button>
    </form>
</div>

<script src="../template/admin/speakingurl.min.js"></script>

<script>
    var slug;
    slug = getSlug(document.getElementById("title").value);
    console.log(slug);
</script>
