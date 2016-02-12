<?php

class ErrorHandler {

  /** error handling. :D 0x010010 = neuspješna radnja s databazom **/
  function throwError($errcode) {
    switch ($errcode) {
      case '0x010010':
        include rootdirpath . 'template/errors/db.php';
        die();
        break;

      case '0x403403':
        include rootdirpath . 'template/errors/forbidden.php';
        die();
        break;

      case '0xCFAA':
        echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Pogreška</title></head><body style="background-color:#f7f7f7;color:#df5000;font-family:\'Helvetica\', \'Arial\'"><h1>:(</h1><h3>Pogreška sustava Nightsparrow</h3><p>Nightsparrow ne može pronaći datoteku konfiguracije, iako je instaliran. Ponovno pokrenite instalaciju ili ručno dodajte <i>config.php</i> datoteku.</p></body></html>';
        die();
        break;

      case '0xAA4A':
        echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Pogreška</title></head><body style="background-color:#f7f7f7;color:#df5000;font-family:\'Helvetica\', \'Arial\'"><h1>:(</h1><h3>Pogreška sustava Nightsparrow</h3><p>Dogodila se pogreška te Nightsparrow ne može nastaviti s obavljanjem zadatka. Kod pogreške: 0xAA4A</p></body></html>';
        die();
        break;

      case '0x3A3A3A':
        echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Pogreška</title></head><body style="background-color:#f7f7f7;color:#df5000;font-family:\'Helvetica\', \'Arial\'"><h1>:(</h1><h3>Pogreška teme ili komponente za Nightsparrow</h3><p>Neka aktivna tema ili komponenta je napravila pogrešku u komunikaciji sa sustavom Nightsparrow te ne može dobaviti sadržaj i nastaviti s radom. Ustvrdite o kojoj se temi ili komponenti rade i deaktivirajte ju ili <b>vratite Nightsparrow na tvorničke postavke</b>.</p></body></html>';
        die();
        break;

      case '0x404404':
        echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Pogreška</title></head><body style="background-color:#f7f7f7;color:#df5000;font-family:\'Helvetica\', \'Arial\'"><h1>:(</h1><h3>Greška 404</h3><p>Stranica koju ste tražili ne postoji.</p></body></html>';
        die();

      default:
        include rootdirpath . 'template/errors/unknown.php';
        break;
    }
  }
}