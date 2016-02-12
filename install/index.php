<?php
if (file_exists('install.lock')) {
  die('Nightsparrow je već instaliran. Ako niste instalirali Nightsparrow, konzultirajte se s dokumentacijom.');
}
require_once '../inc/install.php';
$install = new Installer();
/** Nightsparrow instalacija **/
$dir = dirname(__FILE__); // koja je putanja do foldera
$dir = str_replace('install', '', $dir); // izbacimo install do foldera
$dir = addslashes($dir); // jer Windows postoji, svima nama na žalost
$domain = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$domain = str_replace('install/index.php', '', $domain); // koja nam je domena i putanja do instalacije?
$configfile = file_get_contents('../config.php.new'); // učitajmo predložak za instalaciju
$configfile = str_replace('@@nightsparrow-directory@@', $dir, $configfile); // zamjena placeholdera
$configfile = str_replace('@@nightsparrow-domain-path@@', $domain, $configfile); // zamjena placeholdera
$fpcres = file_put_contents('../config.php', $configfile);
if ($fpcres == false) {
  $install->chmod_error($configfile, 'config.php', 'step2.php'); // spremi vrijednost ili prikaži grešku
  die();
}
if (version_compare(PHP_VERSION, '5.6.0') < 0) { // provjerava verziju PHP-a za kompatibilnost
  include '../template/install/fail_header.php';
  include '../template/install/phpversion_fail.php';
  include '../template/install/footer.php';
  die();
}
if (ini_get('sql.safe_mode') == 'On') { // ovo ne smije biti uključeno
  include '../template/install/fail_header.php';
  include '../template/install/sqlsafemode_fail.php';
  include '../template/install/footer.php';
  die();
} else { // sve kompatibilno! krenimo s instalacijom :)
  include '../template/install/header.php';
  include '../template/install/hello.php';
  include '../template/install/footer.php';
}