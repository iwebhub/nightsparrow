<div class="cont">
    <form class="col s12" action="index.php" method="post">
        <input type="hidden" name="action" value="editUser">
        <input type="hidden" name="id" value="<?php echo htmlentities($_GET['id']); ?>">
        <input type="hidden" name="selfaction" value="<?php if (isset($data)) {
            echo $data['self'];
        } ?>">
        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">

        <div class="row">
            <div class="input-field col s6">
              <label for="email" class="nslabel">Email</label>
              <input id="email" type="email" name="email" class="nsinputfield" required value="<?php if (isset($data)) {
                    echo $data['email'];
                } ?>">
            </div>
            <div class="input-field col s6">
              <label for="password" class="nslabel">Promijenite lozinku</label>
              <input id="password" type="password" name="password" class="nsinputfield">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <label for="name" class="nslabel">Ime i prezime</label>
              <input id="name" name="name" type="text" class="nsinputfield" required value="<?php if (isset($data)) {
                    echo $data['name'];
                } ?>">
            </div>
        </div>
        <?php if ($data['self'] === false) { ?>
            <div class="row">
                <div class="input-field col s12">
                  <label for="level" class="nslabel">Administratorska razina (1-10, veće je jače)</label>
                  <input id="level" name="level" type="number" min="1" max="10" class="nsinputfield" required
                           value="<?php if (isset($data)) {
                               echo $data['level'];
                           } ?>">
                </div>
            </div>
        <?php } ?>

        <p>
          <input type="checkbox" class="nscheckbox" name="banned" value="1"
                   id="banned"  <?php
            if ((isset($data)) && ($data['banned']) == 1) {
                echo 'checked="true"';
            } ?> />
          <label for="banned" class="nslabel if">Zabrani korisniku prijavu na stranicu</label>

        </p>


        <button class="more-themes" type="submit">Spremi promjene &rarr;</i>
        </button>

    </form>
  <br><br>
    <?php if($data['self'] == true){
        echo '<a href="sessions.php">Prikaži moje aktivne prijave</a>';
    }
    ?>
</div>
