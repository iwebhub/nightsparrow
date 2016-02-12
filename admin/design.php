<?php
include '../config.php';
include '../inc/nightsparrow-main.php';
include '../inc/templates.php';
$ns = new Nightsparrow;
$templates = new Templates;
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
$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);
$pageTitle = 'Dizajn';
if(isset($_GET['activate'])){
  $ns->addSetting('core', 'siteActiveTheme', $_GET['activate']);
}
include '../template/admin/header.php';
include '../template/admin/navigation.php';
echo '<p><b>Trenutno aktivna tema:</b> ' . $ns->getSettingValue('core', 'siteActiveTheme') . '</p>';
echo '<div class="container"><div class="row">';
$templates->adminGenerateTemplatePicker();
echo '</div></div>';
include '../template/admin/footer.php';