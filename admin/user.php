<?php

include '../config.php';
include '../inc/nightsparrow-main.php';
$ns = new Nightsparrow;
/** is this a valid session? **/
$status = $ns->validateUserSession($_COOKIE['ns_sid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], time());

if ($status !== true) {
  die(header('Location: ' . domainpath . 'login.php'));
}
if(!isset($_GET['id'])){
  $ns->throwError();
}
/** now, let's check the privilege level! **/
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionEditNonselfUser');

$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));


$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);

if (($actualPrivilege < $neededPrivilege) && ($userID != $_GET['id'])) {
  $ns->throwError(0x403403);
}
elseif ($userID == $_GET['id']){
  $data['self'] = true;


}
else{
  $data['self'] = false;
}

$data['email'] = $ns->getUserDataAPI($_GET['id'], 'email');
$data['name'] = $ns->getUserDataAPI($_GET['id'], 'name');
$data['level'] = $ns->getUserDataAPI($_GET['id'], 'level');
$data['banned'] = $ns->getUserDataAPI($_GET['id'], 'banned');


include '../template/admin/index.php';
echo '<div class="container"><div class="pageEditor">';
$csrfToken = $ns->getSessionCSRF($_COOKIE['ns_sid']);
if($data['self'] == false) {
  echo '<form action="index.php" method="post"><input type="hidden" name="csrfToken" value="' . $csrfToken . '"><input type="hidden" name="deleteUser" value="' . $_GET['id'] . '"><input type="submit" class="btn btn-warning" value="&#x2715; Obriši korisnika"></form>';
}
include '../template/admin/userEditor.php';


echo '</div></div>';

include '../template/admin/footer.php';