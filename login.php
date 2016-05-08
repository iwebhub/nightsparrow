<?php
include_once 'config.php';
include_once 'inc/nightsparrow-main.php';
$ns = new Nightsparrow;
$msg = null;
if (isset($_COOKIE['nightsparrowSession'])) {
  if (!isset($_COOKIE['sessionInvalid'])) {
    $returnloc = domainpath . $_GET['return'];
    die(header('Location: $returnpath'));
  }
}

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'logout') {
    $status = $ns->validateUserSession($_COOKIE['ns_sid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());
    if($status == true){
      $code = $ns->deleteSession($_COOKIE['ns_sid'], $_COOKIE['ns_sessionx'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
    }
    else{
      $msg = '<div class="alert alert-warning">Dogodila se pogreška (0xEE1A01).</div>';
    }
    if ($code == 0) {
      $msg = '<div class="alert alert-success">Odjavljeni ste.</div>';
    } else {
      $msg = '<div class="alert alert-warning">Dogodila se pogreška (0xEE1A00).</div>';
    }
    setcookie('ns_sid', 'loggedout', time()-2700, null, null, null, true);
    setcookie('ns_sessionx', 'loggedout', time()-2700, null, null, null, true);
  }
  if ($_GET['action'] == 'resetpassword') {
    include_once 'template/common/passwordreset.php';
    die();
  }
}


if (isset($_POST)) {
  if (isset($_POST['email'])) {
    if ($ns->emailExists($_POST['email']) == true) {

      if ($ns->countRecentFailedLoginAttempts($_POST['email']) > 5) {
        die('Ovaj korisnicki racun je zakljucan zbog prevelikog broja neuspjelih prijava. Pokusajte ponovno za pola sata.');
      }
      if($ns->getUserDataAPI($ns->getUserID($_POST['email']), 'banned')){
        die('Vas korisnicki racun je suspendiran od strane administratora.');
      }
      if (strlen($_POST['password']) > 72) {
        die('Predugacka lozinka. Maksimalna duljina lozinke za prijavu je 72 znaka.');
      }
      $dv = $ns->checkPassword($_POST['email'], $_POST['password']);
      if ($dv == true) {
        $sessionid = $ns->setUserSession($_POST['email'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
        setcookie('ns_sid', $sessionid, (time() + (60 * 60 * 24 * 3)), null, null, null, true);


        echo '<script type="text/javascript">window.location = "' . domainpath . $_POST['return'] . '"</script>';

        $msg = '<div class="alert alert-success">Prijavljeni ste! :D <a href="' . $_POST['return'] . '">Kliknite ovdje da bi nastavili &rarr;</a></div>';
      } else {
        $msg = '<div class="alert alert-info" role="alert">Podatci za pristup nisu valjani. Pokušajte ponovno.</div>';
        $ns->setUserSession($_POST['email'], '0.0.0.0', 'FAILED_ATTEMPT_NIGHTSPARROW_LOGIN');
      }
    } else {
      $msg = '<div class="alert alert-info" role="alert">Podatci za pristup nisu valjani. Pokušajte ponovno.</div>';
      if ($ns->emailExists($_POST['email']) == true) {
        $ns->setUserSession($_POST['email'], '0.0.0.0', 'FAILED_ATTEMPT_NIGHTSPARROW_LOGIN');
      }
    }
  }
}


include_once 'template/common/login.php';