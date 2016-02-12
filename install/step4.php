<?php
if (file_exists('install.lock')) {
  die('Nightsparrow je već instaliran. Ako niste instalirali Nightsparrow, konzultirajte se s dokumentacijom.');
}
include '../config.php';
include '../inc/nightsparrow-main.php';
include '../inc/templates.php';
$ns = new Nightsparrow;
$templates = new Templates;

if (isset($_GET['type'])) { // je li odabrana vrsta stranice
  $ns->addSetting('core', 'siteType', $_GET['type']); // ako je, dodajmo ju u bazu
  setcookie('siteType', $_GET['type'], time() + (100 * 60));
  include '../template/install/header.php';
  include '../template/install/step4_part2.php';
  include '../template/install/footer.php';
} elseif (isset($_POST['s4']) && ($_POST['s4'] == 'true')) {
  $ns->addSetting('core', 'siteName', $_POST['name']); // dodajmo postavke o stranici
  $ns->addSetting('core', 'siteDescription', $_POST['description']);

  header('Location: step5.php');
} else {
  include '../template/install/header.php';
  include '../template/install/step4_part1.php';
  include '../template/install/footer.php';
}