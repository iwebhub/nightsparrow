<div class="cont">
    <div class="pageEditor">
            <form class="col s12" action="index.php" method="post">
                <input type="hidden" name="action" value="settingsManager">
                <input type="hidden" name="csrfToken" value="<?php echo $csrfToken; ?>">


                    <p>Metapodatci</p><br><br>

                    <div class="input-field col s12">
                      <label for="summary" class="nslabel">Ime stranice</label>
                      <br>
                        <input id="siteName" name="siteName" class="nsinputfield" type="text" class="validate"
                               value="<?php if (isset($data)) {
                                   echo $data['siteName'];
                               } ?>">
                    </div>
      <div class="input-field col s12">
        <label for="siteDescription" class="nslabel">Opis web stranice <small>(prikazuje se u tražilicama i na sličnim mjestima)</small></label><br>
                <textarea name="siteDescription" class="nsinputfield" required><?php if (isset($data)) {
                    echo $data['siteDescription'];
                  } ?></textarea>

      </div>
      <label for="headerContent" class="nslabel">Zaglavlje web stranice</label><br><br>
                        <textarea name="headerContent" class="nsinputfield"><?php if (isset($data)) {
                            echo $data['headerContent'];
                          } ?></textarea>


      <label for="footerContent" class="nslabel">Podnožje web stranice</label><br><br>
                        <textarea name="footerContent" class="nsinputfield"><?php if (isset($data)) {
                            echo $data['footerContent'];
                          } ?></textarea>

      <p class="nslabel warning">Tema određuje gdje se zaglavlje i podnožje pojavljuju.</p><br>

      <div class="input-field col s12">
        <label for="logoLink" class="nslabel">URL logotipa <small>(ako nije postavljeno, koristi se tekst)</small></label><br>
        <input id="logoLink" name="logoLink" type="text" class="nsinputfield"
               value="<?php if (isset($data)) {
                 echo $data['logoLink'];
               } ?>">
      </div>





            <div class="input-field col s12">
                <label for="siteType" class="nslabel">Vrsta stranice</label><br><br>

              <div class="flex-center">
                <p>
                    <input name="siteType" value="personal" type="radio" class="nsradio"
                           id="personal" <?php if ($data['siteType'] == 'personal') {
                        echo 'checked';
                    } ?> />
                    <label for="personal" class="nslabel if">Osobna web stranica ili web stranica grupe ljudi</label>
                </p>
                </div>
              <div class="flex-center">
              <p>
                    <input name="siteType" type="radio" value="company" class="nsradio"
                           id="company" <?php if ($data['siteType'] == 'company') {
                        echo 'checked';
                    } ?> />
                    <label for="company" class="nslabel if">Web stranica tvrtke ili organizacije</label>
                </p>
</div>
              <div class="flex-center">

              <p>
                    <input name="siteType" value="project" type="radio" class="nsradio"
                           id="project"<?php if ($data['siteType'] == 'project') {
                        echo 'checked';
                    } ?>/>
                    <label for="project" class="nslabel if">Web stranica proizvoda ili projekta</label>
                </p>
</div>
              <div class="flex-center">

              <p>
                    <input name="siteType" type="radio" value="blog" class="nsradio" id="blog" <?php if ($data['siteType'] == 'blog') {
                        echo 'checked';
                    } ?> />
                    <label for="blog" class="nslabel if">Blog</label>
                </p>
              </div>
                <p>Konfiguracija</p><br><br>
                <p>
                    <input type="checkbox" class="nscheckbox pluginManagerStatus" name="pluginManagerStatus" value="1"
                           id="pluginManagerStatus" <?php if ((isset($data)) && ($data['pluginManagerStatus'] == 1)) {
                        echo 'checked="checked"';
                    } else {
                        echo '';
                    } ?> />
                    <label for="pluginManagerStatus" class="nslabel ib">Omogući dodatke</label>
                </p>
                <?php if ((isset($data)) && ($data['pluginManagerStatus'] == 1)) { ?>
                    <p>
                        <input type="checkbox" class="nscheckbox analyzeStatus" name="analyzeStatus" value="1"
                               id="analyzeStatus" <?php if ((isset($data)) && ($data['analyzeStatus'] == 1)) {
                            echo 'checked="checked"';
                        } else {
                            echo '';
                        } ?> />
                        <label for="analyzeStatus" class="nslabel ib">Omogući analitiku
                            <small>(pruža dodatak <b>Analyze</b> autora <b>Nightsparrow</b>)</small>
                        </label>

                    </p>
                <?php } ?>
                <p>
                    <input type="checkbox" class="nscheckbox registrationStatus" name="registrationStatus" value="1"
                           id="registrationStatus" <?php if ((isset($data)) && ($data['registrationStatus'] == 1)) {
                        echo 'checked="checked"';
                    } else {
                        echo '';
                    } ?> />
                    <label for="registrationStatus" class="nslabel ib">Omogući javnu registraciju</label>
                </p>
                <!--  <p>
      <input type="checkbox" class="pageCommentStatus" name="pageCommentStatus" value="1"
             id="pageCommentStatus" <?php if ((isset($data)) && ($data['pageCommentStatus'] == 1)) {
                    echo 'checked="checked"';
                } else {
                    echo '';
                } ?> />
      <label for="pageCommentStatus">Omogući komentare na stranicama</label>
    </p>-->

                <p>
                    <input type="checkbox" class="nscheckbox" name="disablePublicAPI" value="1"
                           id="disablePublicAPI" <?php if ((isset($data)) && ($data['publicAPIStatus'] == 1)) {
                        echo 'checked="true"';
                    } else {
                        echo '';
                    } ?> />
                    <label for="disablePublicAPI" class="nslabel ib">Zabrani pristup javnom API-ju</label>
                </p>
                <br><br>
                  <label for="postsPerPage" class="nslabel">Broj postova po stranici</label><br><br>
                        <input id="postsPerPage" name="postsPerPage" value="<?php if (isset($data)) {
                            echo $data['postsPerPage'];
                        } ?>" type="number" min="1" max="100" class="nsinputfield" required>



<br>
                    <button class="more-themes" type="submit">Spremi &rarr;
                    </button>
                </div>
            </div>

  <br><br>          <a href="settings-table.php">Pogledaj tablicu svih postavki i njihovih revizija</a>

            </form>


    </div>
</div>