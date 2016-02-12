<?php
if (file_exists('install.lock')) {
  die('Nightsparrow je već instaliran. Ako niste instalirali Nightsparrow, konzultirajte se s dokumentacijom.');
}
include '../config.php';
include '../inc/nightsparrow-main.php';
include '../inc/templates.php';
$ns = new Nightsparrow;
$templates = new Templates;

if (isset($_GET['activate'])) {
  $ns->addSetting('core', 'siteActiveTheme', $_GET['activate']);
  include '../template/install/header.php';
  include '../template/install/final.php';
  include '../template/install/footer.php';
  file_put_contents('install.lock', 'full');
} else {
  include '../template/install/header.php';
  include '../template/install/step5.php';
  include '../template/install/footer.php';
}