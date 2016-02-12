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
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionHomepage');
$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($actualPrivilege < $neededPrivilege) {
  $ns->throwError(0x403403);
}
$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);

include '../template/admin/index.php';
echo '<div class="container"><div class="placeEditor">';
$project = $ns->getSettingValue('kruzimo', 'project');
$csrfToken = $ns->getSessionCSRF($_COOKIE['ns_sid']);
if (isset($_GET['update'])) {
  $data = $ns->getPlaceAPI($_GET['update']);
  $field = 'update-place';
  $value = htmlentities($_GET['update']);
} else {
  $field = 'add';
  $value = 'new';
}
include '../template/admin/addPlaceForm.php';


echo '</div></div>';

include '../template/admin/footer.php';