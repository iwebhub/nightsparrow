<div class="cont">
    <form class="col s12" action="index.php" method="post">
        <input type="hidden" name="action" value="addUser">
        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">

        <div class="row">
            <div class="input-field col s6">
              <label for="email" class="nslabel">Email</label>
              <input id="email" type="email" name="email" class="nsinputfield" required>
            </div>
            <div class="input-field col s6">
              <label for="password" class="nslabel">Lozinka</label>
              <input id="password" type="password" name="password" class="nsinputfield" required>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
              <label for="name" class="nslabel">Ime i prezime</label>
              <input id="name" name="name" type="text" class="nsinputfield" required>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
              <label for="level" class="nslabel">Administratorska razina <small>(1-10)</small></label>
              <input id="level" name="level" type="number" min="1" max="10" class="nsinputfield" required>
            </div>
        </div>


        <button class="more-themes" type="submit">Dodaj
            <i class="mdi-content-send right"></i>
        </button>

        <p>Kada kliknete na Dodaj, bit će stvoren <b>novi korisnik</b>. </p>
    </form>
</div>
