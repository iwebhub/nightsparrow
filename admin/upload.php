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

if ($_GET['upload'] == 'photo') {
  $path = $ns->uploadPhoto($_FILES);
  $path = str_replace(rootdirpath, domainpath, $path);
  $array = array('filelink' => $path);

  echo stripslashes(json_encode($array));
}
if ($_GET['upload'] == 'file') {
  $path = $ns->uploadFile($_FILES);
  $path = str_replace(rootdirpath, domainpath, $path);
  $array = array('filelink' => $path);

  echo stripslashes(json_encode($array));
}