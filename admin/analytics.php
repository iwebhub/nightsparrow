<?php
include '../config.php';
include '../inc/nightsparrow-main.php';
$ns = new Nightsparrow;
/** is this a valid session? **/
$status = $ns->validateUserSession($_COOKIE['ns_sid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());

if ($status !== true) {
  die(header('Location: ' . domainpath . 'login.php'));
}
/** now, let's check the privilege level! **/
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionSettingsManager');
$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($actualPrivilege < $neededPrivilege) {
  $ns->throwError(0x403403);
}
$pageTitle = 'Analitika';

$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);

$csrfToken = $ns->getSessionCSRF($_COOKIE['ns_sid']);

if($_GET['export'] !== 'csv') {
  include '../template/admin/header.php';
  include '../template/admin/navigation.php';
}


if($ns->getSettingValue("pluginManager", "pluginManager:Enabled") == 1){
  if ($ns->getSettingValue("pluginManager", "analytics:Enabled") == 1) {
    require_once '../inc/analyze.php';
    $analyze = new Analyze();

  }
  else{
    die("<h1>Analitika nije omogućena.</h1><a href=\"settings-manager.php\">Postavke</a>");
  }
}
else{
  die("<h1>Dodaci nisu omogućeni.</h1><a href=\"settings-manager.php\">Postavke</a>");
}






if(isset($_GET['export'])){
  if($_GET['export'] == 'html'){echo '<div class="container">';}
  $data = $analyze->getDataExportDump($_GET['export']);
  if($_GET['export'] == 'html'){
  echo '<a href="analytics.php">Prikaz sažetka</a> &middot; <a href="?export=csv">Izvezi u CSV</a>';
  echo '</div>';}
}
else{
  $data = $analyze->analyzeVisits();

  include '../template/admin/analytics.php';
}




if($_GET['export'] !== 'csv'){
  include '../template/admin/footer.php';
}