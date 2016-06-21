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
$neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionUserListViewer');
$actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($actualPrivilege < $neededPrivilege) {
    $ns->throwError(0x403403);
}
$edit_neededPrivilege = $ns->getSettingValue('core', 'adminPanelPermissionManageNonselfUser');
$edit_actualPrivilege = $ns->getUserPrivilege($ns->getSessionUser($_COOKIE['ns_sid']));
if ($edit_actualPrivilege < $edit_neededPrivilege) {
    $canEdit = false;
} else {
    $canEdit = true;
}

if ($canEdit == false) {
    echo '<div class="card-panel"><span class="blue-text text-darken-2"> Nemate pravo uređivati korisnike osim sebe.</span></div>';
}

$loggedInUser = $ns->getUserRealname($ns->getSessionUser($_COOKIE['ns_sid']));
$userID = $ns->getSessionUser($_COOKIE['ns_sid']);

include '../template/admin/users.php';
echo '<div class="container"><div class="userStructureMap shadow-z-3">';
echo ' <ul class="collection">';
$ns->adminGetUserList();
echo '</ul></div></div>';
include '../template/admin/footer.php';